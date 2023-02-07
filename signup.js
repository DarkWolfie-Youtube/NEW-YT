
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.17.1/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.17.1/firebase-analytics.js";
  import { getAuth, createUserWithEmailAndPassword, signInWithEmailAndPassword, onAuthStateChanged, signOut } from "https://www.gstatic.com/firebasejs/9.17.1/firebase-auth.js";

  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
    apiKey: "AIzaSyD8p2wy9ftIXyYE_vj2xYKdkqQBc3K8e_I",
    authDomain: "wolftube-6e83a.firebaseapp.com",
    databaseURL: "https://wolftube-6e83a-default-rtdb.firebaseio.com",
    projectId: "wolftube-6e83a",
    storageBucket: "wolftube-6e83a.appspot.com",
    messagingSenderId: "352393340794",
    appId: "1:352393340794:web:9b9822a09c6667cc4a98c3",
    measurementId: "G-X1W8K649YJ"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);

// get email and passowrd.


const auth = getAuth(app);
function DarkWolfieTube() {
  var email = document.getElementById('email').value
var password = document.getElementById("pass").value
createUserWithEmailAndPassword(auth, email, password)
  .then((userCredential) => {
    // Signed in 
    const user = userCredential.user;
    // ...
  })
  .catch((error) => {
    const errorCode = error.code;
    const errorMessage = error.message;
    // ..
  });
  

}


document.getElementById("submit").addEventListener("click",(e) =>{
    DarkWolfieTube()
  }
    
    )




