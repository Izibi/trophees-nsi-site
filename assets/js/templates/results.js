let buttons = [...document.getElementsByClassName('block__region__fold')]
let nat = document.getElementById('tabn')
let reg = document.getElementById('tabr')
let national = document.getElementById('national')
let regional = document.getElementById('regional')
let active = 'tabn'
let tabs = new Set([nat, reg])
let contents = new Set([national, regional])

buttons.forEach((button, i) => {
  button.onmousedown = function () {
      button.parentNode.parentNode.classList.toggle("-folded")
  };
});

// National
nat.onmousedown = function () {
    toggleActive(nat)
};

// Regional
reg.onmousedown = function () {
    toggleActive(reg)
};

function toggleActive(item) {
  if(active === item.id) return

  active = item.id

  tabs.forEach( tab => tab.classList.toggle('-active') )
  contents.forEach( tab => tab.classList.toggle('-hidden') )
}
