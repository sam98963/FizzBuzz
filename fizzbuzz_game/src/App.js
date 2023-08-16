import './App.css';
import {useEffect, useState} from "react"
import FizzBuzzList from './components/FizzBuzzList';
import 'bootstrap/dist/css/bootstrap.min.css';
import Header from './components/Header';

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

    fetchData()
  }, []);


  // HandleClick to handle api calls on button click
  async function handleFizzBuzzClick(){
        const response = await fetch("http://localhost:8000/fizzbuzz.php");
        const data = await response.json();
        console.log(data)
        setApiResult(data.payload);
      }

  async function handleFizzClick(){
        const response = await fetch("http://localhost:8000/fizz.php");
        const data = await response.json();
        console.log(data)
        setApiResult(data.payload);
      }

  async function handleBuzzClick(){
        const response = await fetch("http://localhost:8000/buzz.php");
        const data = await response.json();
        setApiResult(data.payload);
      }

  return(
    // render result on page.
    <div className='d-flex flex-column align-items-center' style={{width:"100vw"}}>
      <Header />
      <div className='d-flex justify-content-center mb-3'>
        <button className="m-2" onClick={handleFizzClick}>Fizz</button>
        <button className="m-2" onClick={handleBuzzClick}>Buzz</button>
        <button className="m-2" onClick={handleFizzBuzzClick}>FizzBuzz</button>
      </div>
      <FizzBuzzList apiResult = {apiResult}/>
    </div>
  )
}


// Render 3 buttons - fizz, buzz and fizzbuzz.
// function handle api calls with relevent endpoints
// Display numbers and relevant transformed numbers in small boxes on screen - 1-100.

export default App;
