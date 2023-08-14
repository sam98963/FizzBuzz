import ListItems from "./ListItems"
export default function FizzBuzzList({apiResult}){
  return(
    <div className="d-flex flex-wrap">
          {/* Map over the returned result and render each component with the value. The key is the numerical value of each item. */}
          {apiResult && apiResult.map((item, index) => <ListItems key={index+1} value={item}/>)}
    </div>
  )
}