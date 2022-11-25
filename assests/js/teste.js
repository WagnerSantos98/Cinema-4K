let spinNumberOutput = document.querySelector('.spinNumberOutput')
let regularPrice = document.querySelector('.regularPrice')
let quantityOutput = document.querySelector('.quantityOutput')
let plusButton = document.querySelector('.incrimentButton')
let minusButton = document.querySelector('.decrimentButton')

spinNumberOutput.value = 1;
quantityOutput.innerHTML = regularPrice.innerHTML * spinNumberOutput.value

plusButton.addEventListener('click', function(){
    spinNumberOutput.value ++
    console.log( quantityOutput.innerHTML = regularPrice.innerHTML * spinNumberOutput.value)
})

minusButton.addEventListener('click', function(){

    if( spinNumberOutput.value > 1){
     spinNumberOutput.value--
    console.log( quantityOutput.innerHTML = regularPrice.innerHTML * spinNumberOutput.value)

     }
})

let spinNumberOut = document.querySelector('.spinNumberOut')
let price = document.querySelector('.price')
let quantity = document.querySelector('.quantity')
let plus = document.querySelector('.incriment')
let minus = document.querySelector('.decriment')

spinNumberOut.value = 1;
quantity.innerHTML = price.innerHTML * spinNumberOut.value

plus.addEventListener('click', function(){
    spinNumberOut.value ++
    console.log( quantity.innerHTML = price.innerHTML * spinNumberOut.value)
})

minus.addEventListener('click', function(){

    if( spinNumberOut.value > 1){
     spinNumberOut.value--
    console.log( quantity.innerHTML = price.innerHTML * spinNumberOut.value)

     }
})
    