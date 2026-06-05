import { anime } from 'animejs';

// Exponer el objeto básico de Anime.js para que la vista Blade lo use
window.animeJS = anime;

// Nota: Eliminamos la función initHeroTitle de aquí, ya que el script de tu vista Blade 
// ahora se encarga de segmentar el texto y animarlo con el toque moderno en 3D de forma segura.