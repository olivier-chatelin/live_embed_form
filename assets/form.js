const ingredientContainer = document.getElementById('ingredient-container');
const form = ingredientContainer.dataset.prototype;
const button = document.getElementById('button-ingredient');
let index = 0;
const regex = /__name__/g
button.addEventListener('click',(e)=>{
    e.preventDefault();
    index ++;
    let li = document.createElement('li');
    let newForm = form.replace(regex, 'ingredient' + index)
    li.innerHTML=newForm;
    ingredientContainer.appendChild(li);

})