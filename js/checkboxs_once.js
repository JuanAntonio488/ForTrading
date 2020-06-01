function selectOnlyThis(id){
    var ecivil = document.getElementsByName("ecivil");
    Array.prototype.forEach.call(ecivil,function(el){
      el.checked = false;
    });
    id.checked = true;
  }