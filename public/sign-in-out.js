  //Contact form functions
  const contactContainer = document.querySelector(".contact-container");
  const registerBtn = document.querySelector(".register-btn-n");
  const loginBtn = document.querySelector(".login-btn-n");


  registerBtn.addEventListener('click', () =>{
    contactContainer.classList.add('active');
  });

  
  loginBtn.addEventListener('click', () =>{
    contactContainer.classList.remove('active');
  });


  // 1. Firebase config (replace with your actual config)
const firebaseConfig = {
    apiKey: "YOUR_API_KEY",
    authDomain: "YOUR_AUTH_DOMAIN",
    projectId: "YOUR_PROJECT_ID",
    appId: "YOUR_APP_ID"
  };
  
  // 2. Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  const auth = firebase.auth();
  
  // 3. Register
  document.querySelector('button[name="registerBtn"]').addEventListener('click', (e) => {
    e.preventDefault();
    const name = document.querySelector('input[name="name"]').value;
    const email = document.querySelector('input[name="email"]').value;
    const password = document.querySelector('input[name="password"]').value;
  
    auth.createUserWithEmailAndPassword(email, password)
      .then((userCredential) => {
        const user = userCredential.user;
        return user.updateProfile({ displayName: name });
      })
      .then(() => {
        alert("Registration successful!");
      })
      .catch(error => {
        alert("Error: " + error.message);
      });
  });
  
  // 4. Login
  document.querySelector('button[name="logginBtn"]').addEventListener('click', (e) => {
    e.preventDefault();
    const email = document.querySelector('input[name="email"]').value;
    const password = document.querySelector('input[name="password"]').value;
  
    auth.signInWithEmailAndPassword(email, password)
      .then((userCredential) => {
        const user = userCredential.user;
        updateUserUI(user.displayName || user.email);
      })
      .catch(error => {
        alert("Login failed: " + error.message);
      });
  });
  
  // 5. Logout button creation
  function updateUserUI(username) {
    const contactSection = document.querySelector('#contact .heading');
    contactSection.textContent = `Welcome, ${username}`;
  
    const logoutBtn = document.createElement("button");
    logoutBtn.textContent = "Logout";
    logoutBtn.className = "btn-n";
    logoutBtn.style.margin = "20px";
    logoutBtn.onclick = () => {
      auth.signOut().then(() => {
        location.reload();
      });
    };
  
    contactSection.parentElement.appendChild(logoutBtn);
  }
  
  // 6. Maintain login state on reload
  auth.onAuthStateChanged((user) => {
    if (user) {
      updateUserUI(user.displayName || user.email);
    }
  });
  