//Performance
import performance from "../app/usefull/performance";
performance.init();

//Dynamic js load
import moduleCaller from "../app/usefull/module-caller";

//Modules (Import your JS files here)
import Navbar from "../app/modules/navbar";
import ImageGallery from "../app/modules/image_gallery";
import Video from "../app/modules/video";
import Posts from "../app/modules/posts";


//Add JS class and HTML class for each module
const navbar = new Navbar();
navbar.init();

moduleCaller([
    {
        domModule: '.js-image-gallery',
        classModule: ImageGallery
    },
    {
        domModule: '.js-posts-pagination',
        classModule: Posts
    },
    {
        domModule: '.js-video',
        classModule: Video
    }
]);


//Page Animations
import animations from "../app/usefull/animations";
animations.init();