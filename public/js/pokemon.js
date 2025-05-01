let selectType = document.getElementById("selectType");

selectType.addEventListener("change", e=>{
    fetch(document.location.origin + document.location.pathname + "?action=getPokemonByType&idType="+selectType.value)
    .then(rep=>rep.json())
    .then(function(data){
        let div = document.getElementById("divPokemon");
        div.innerHTML = "";
        let table = document.createElement("table");
        table.innerHTML = "<thead><tr><th>Nom</th><th>Taille</th><th>Poids</th></thead>";
        let tbody = document.createElement("tbody");
        table.appendChild(tbody);
        data.forEach(pokemon => {
            let tr = document.createElement("tr");
            tr.innerHTML = "<td>"+pokemon.nom+"</td><td>"+pokemon.taille+"</td><td>"+pokemon.poids+"</td>";
            tbody.appendChild(tr);
        });
        div.appendChild(table);
    })
    .catch(function(e){
        console.log(e);
    })
});