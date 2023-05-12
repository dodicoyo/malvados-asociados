
const {src,dest, watch,parallel} = require("gulp");
//css
//este codigo es para la compilacion de hojas de estilo de sass en css
const sass = require('gulp-sass')(require('sass'));
const plumber = require('gulp-plumber');
const autoprefixer = require('autoprefixer');//esto se va asegurar de que funcione en el navegador que yo lediga aun que no tiene mucho soporte talves esats usando lo ultiumo de css y el navegador no lo soporta se encarga de corregir eso
const cssnano = require('cssnano');//
const postcss = require('gulp-postcss');
//esta linea de codigo nos va ayudar a identificar en que hoja de estilo scss esta las clases 
const sourcemaps=require('gulp-sourcemaps');

//imagenes

//este codigo convierte imagenes a webp o avif 
const cache = require('gulp-cache');

const webp = require('gulp-webp');
//const avif = require('gulp-avif');

//javaScript
const terser =require('gulp-terser-js');

function css(done){
    //alamacenarlo en el disco duro
    src('src/scss/**/*.scss')    //identificar el archivo de sass esto de forma recursiva va ir buscando en la carpeta sass y escuchando todos los cambios que tengan la extencion .scss
    .pipe(sourcemaps.init())//esto inicializara y nos ayudara a identificar dondete tenemos que editar en nuestras hojas de estilo
    .pipe(plumber())
    .pipe(sass())// Compilarlo
    .pipe(postcss([autoprefixer(), cssnano()]))
    .pipe(sourcemaps.write('.'))//esto mostrara la uvicacion dela hoja de estilos de css
    .pipe(dest("build/css"));//esto toma la uvicacion del archivo para almacenarlo
    done();//esto es un callback o fin dela funcion que avisa a gulp cuando llegamos al final de la ejecucion 

}

function javascript(done){
    src("src/js/**/*.js")
    .pipe(sourcemaps.init())
    .pipe(terser())
    .pipe(sourcemaps.write('.'))
    .pipe(dest('build/js'))
    done();
}   

function dev(done){
    watch("src/scss/**/*.scss", css);//watch hace que escuche los cambios y se actualiza cadaves que agamos cambios que se ejecuta todo el tiempo y aqui le decismo los cambios que opcurre solo en ese archvio
    watch("src/js/**/*.js", javascript);
    done();
}


// esta seccion toa todas imagenes que hay dentro dela carpeta src/ig y las cobierte a webp y avif ya que son mas ligeras y nose pierde calidad
function versionWebp( done ) {
    const opciones = {
        quality: 50
    };
    src('src/img/**/*.{png,jpg}')
        .pipe( webp(opciones) )
        .pipe( dest('build/img') )
    done();
}
function versionAvif( done ) {
    const opciones = {
        quality: 50
    };
    src('src/img/**/*.{png,jpg}')
        .pipe( avif(opciones) )
        .pipe( dest('build/img') )
    done();
}

exports.dev=parallel(css,versionWebp,dev, javascript);
//esto de abajo es un ejemplo 
//function tarea(done){
//    console.log('mi tarea');
 //   done();
//}


//exports.primertarea = tarea;//exports es codigo node aqui estoy diciendo que cuando yo mande a ejecutar tarea ejeuctara la funcoin tarea en conslo ponemos npx gulp primer tarea