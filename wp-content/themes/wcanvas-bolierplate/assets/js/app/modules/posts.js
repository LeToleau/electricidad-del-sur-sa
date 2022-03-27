import Pagination from "../usefull/pagination";

class Posts {
    constructor(module) {
        this.module = module;
        this.pagination; 
    }   

    init() {
        this.pagination = new Pagination(this.module);
    }

}

export default Posts;