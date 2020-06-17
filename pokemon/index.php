<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1 class="tittle">POKEDEX</h1>
    <center>
    <button onclick="consultarPokemones()">BATALLA</button>
    <center>
    </br>
    <div class="pokemon-list" id="listarpokemon">
        <div class="pokemon" id="pok-1">
            <img src="">
            <p></p>
        </div>

        <div class="vs">VS</div>
        <div class="pokemon" id="pok-2">
            <img src="">
            <p></p>
        </div>
    </div>

    <script>
        let lista=document.getElementById("listarpokemon");

        function consultarPokemon(id,number){
            fetch(`https://pokeapi.co/api/v2/pokemon/${id}`)
            .then(res=>{
                console.log(res)
                res.json()
                .then(pokemon=>
                mostrarPokemon(pokemon,number))

            })
        }

        function consultarPokemones(){
           let primerPokemon= Math.round(Math.random()*150);
           let segundoPokemon= Math.round(Math.random()*150);
           consultarPokemon(primerPokemon,1);
           consultarPokemon(segundoPokemon,2);
        }

        function mostrarPokemon(pokemon,id){
            let item =lista.querySelector(`#pok-${id}`);
            let img =item.getElementsByTagName("img")[0];
            img.setAttribute("src", pokemon.sprites.front_default);
            let nombre = item.getElementsByTagName("p")[0];
            nombre.textContent=pokemon.name;
        }

    </script>
</body>
</html>