import { initializeApp } from 'firebase/app';

// TODO: Replace the following with your app's Firebase project configuration
const firebaseConfig = {
  apiKey: "AIzaSyD8p2wy9ftIXyYE_vj2xYKdkqQBc3K8e_I",
  authDomain: "wolftube-6e83a.firebaseapp.com",
  databaseURL: "https://wolftube-6e83a-default-rtdb.firebaseio.com",
  projectId: "wolftube-6e83a",
  storageBucket: "wolftube-6e83a.appspot.com",
  messagingSenderId: "352393340794",
  appId: "1:352393340794:web:054ad922ff6fee004a98c3",
  measurementId: "G-YXEMK6MPD7"
};

const app = initializeApp(firebaseConfig);

import { getAuth } from 'firebase/auth';

