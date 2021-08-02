//Search
const idSearchFilter = document.getElementById('idSearchFilter');

if(idSearchFilter !== null){
    idSearchFilter.addEventListener('keyup', searchMenus)};

const menus = document.querySelectorAll('.single-menu');

function searchMenus(){
    

      const recherche = this.value.toLowerCase();
      
    Array.prototype.forEach.call(menus, function(menu) {
        

        if (menu.textContent.toLowerCase().indexOf(recherche) > -1) {
            
            menu.style.display = 'inline-block';
            
        } else {
          menu.style.display = 'none';
        }});
};



//Refresh
const searchRefresh = document.getElementById('searchRefresh');

if(idSearchFilter != null){
    searchRefresh.addEventListener('click', refreshMenus)};


function refreshMenus(){
    
  document.location.reload();
    
};

