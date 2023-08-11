import './App.css';
import {useEffect, useState} from "react"
function App() {
  // On page render (on mount) => get request.
  const [apiResult, setApiResult] = useState();
  useEffect(()=>{
    let response = fetch("http://localhost:8000");
    let data = JSON.parse(response);
    setApiResult(data);
  }, []);
  return(
    <h1>{apiResult}</h1>
  )
}


// Render 3 buttons - fizz, buzz and fizzbuzz.
// function handle api calls with relevent endpoints
// Display numbers and relevant transformed numbers in small boxes on screen - 1-100.

export default App;
