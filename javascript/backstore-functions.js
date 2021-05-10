function deleteRow(btn) {
  var state = confirm("Are you sure you want to delete this product?");
  if(state){
    var row = btn.parentNode.parentNode;
    row.parentNode.removeChild(row);
  }
  
}
function confirmDelete(){
  return confirm('Are you sure you want to delete this item? (This actually deletes the product from the database so be careful)');
}