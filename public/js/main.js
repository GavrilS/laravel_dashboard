function openMod(obj) {
    let id = obj.nextSibling.innerHTML;
    let modalId = document.getElementById('modal1_id');
    modalId.value = id;
  }
  
  function updateMod(obj) {
    let id = obj.nextSibling.innerHTML;
    let modalId = document.getElementById('modal2_id');
    modalId.value = id;
  }
  
  function deleteMod(obj) {
    let id = obj.previousSibling.innerHTML;
    let modalId = document.getElementById('modal3_id');
    modalId.value = id;
  }
