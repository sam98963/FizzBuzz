import ListItems from "./ListItems"
export default function FizzBuzzList({apiResult}){
  return(
    <div className="d-flex flex-wrap">
          {apiResult && apiResult.map(item => <ListItems key={item} value={item}/>)}
    </div>
  )
}