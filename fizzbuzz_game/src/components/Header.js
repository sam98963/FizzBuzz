import logo from "../images/Fizzbuzzlogo.png"
export default function Header(){
  return(
    <div className="d-flex align-items-center justify-content-center" style={{ width: "100%", height: "200px" }}>
      <img src={logo} alt="FizzBuzz Logo"/>
    </div>
  )
}