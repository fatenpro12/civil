import axios from "axios";
//const token = JSON.parse(localStorage.getItem('token'));
export default axios.create({
  baseURL: "http://localhost:8000/api",//https://testdesign.tazmeen.com/public_html_domains/testdesign.tazmeen.com/api",
  headers: {"Access-Control-Allow-Origin": "*"}
  //headers: {"Authorization" : `Bearer ${token}`}
});


//
