import './App.css';
import {useEffect, useState} from "react"
import FizzBuzzList from './components/FizzBuzzList';
import 'bootstrap/dist/css/bootstrap.min.css';

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
    setApiResult(data.payload);
  }
  
  // On page render (on mount) => call fetch function
  useEffect(()=>{
    console.log(apiResult)
    console.log("apiResult:", apiResult);

    fetchData()
  }, []);


  // HandleClick to handle api calls on button click
  async function handleClick(){
        const response = await fetch("http://localhost:8000/fizzbuzz");
        const data = await response.json();
        console.log(data)
        console.log("This is the unmodified data:",data.debug)
        console.log("This is the modified data:",data.payload)
        setApiResult(data.payload);
      }

  return(
    // render result on page.
    <>
    <h1>FizzBuzz</h1>
    <button onClick={handleClick}>FizzBuzz</button>
    <FizzBuzzList apiResult = {apiResult}/>
    </>
  )
}


// Render 3 buttons - fizz, buzz and fizzbuzz.
// function handle api calls with relevent endpoints
// Display numbers and relevant transformed numbers in small boxes on screen - 1-100.

export default App;
