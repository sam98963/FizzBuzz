import './App.css';
import {useEffect, useState} from "react"
function App() {
  // establish apiResult state to store response data
  const [apiResult, setApiResult] = useState();
  // async function to handle requests to backend
  async function fetchData(){
    // get request
    let response = await fetch("http://localhost:8000");
    // Parse the JSON response
    let data = await response.json();
    // Set state to response 
    setApiResult(data.message);
  }
  
  // On page render (on mount) => call fetch function
  useEffect(()=>{
    console.log(apiResult)
    fetchData()
  }, []);

  return(
    // render result on page.
    <h1>{apiResult}</h1>
  )
}


// Render 3 buttons - fizz, buzz and fizzbuzz.
// function handle api calls with relevent endpoints
// Display numbers and relevant transformed numbers in small boxes on screen - 1-100.

export default App;
