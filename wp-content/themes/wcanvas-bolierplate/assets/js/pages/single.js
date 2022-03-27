//Performance
import performance from "../app/usefull/performance";
performance.init();

//Dynamic js load
//import moduleCaller from "../app/usefull/module-caller";

//Modules (Import your JS files here)
import Navbar from "../app/modules/navbar";

//Add JS class and HTML class for each module
const navbar = new Navbar();
navbar.init();

//Example for test module, replace it with your module/s
/*
moduleCaller([
    {
        domModule: '.js-test',
        classModule: Test
    }
]);
*/

//Page Animations
import animations from "../app/usefull/animations";
animations.init();