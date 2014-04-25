(function ($) {

    //demo data
    var comments = [
        { pub_date: "", comment: "Some comment" },
        { nick: "C", pub_date: "", comment: "Some comment" },
        { nick: "Abh", pub_date: "", comment: "Some comment" },
        { nick: "Awe", pub_date: "", comment: "Some comment" },
        { nick: "Dude", pub_date: "", comment: "Some comment" },
    ];
    var blog = [
        { title: "sffg", blog:"hgfgh", pub_date: "2 mins", user:"hg"}
    ];

    //define product model
//    var Comment = Backbone.Model.extend({
//        defaults: {
//            nick: "Anonymous",
//            pub_date: "",
//            comment: ""
//        }
//    });
    
    var Blog = Backbone.Model.extend({
        defaults: {
            title: "",
            pub_date: "",
            blog: "",
            user: "Anonymous"
        }
    });

    //define directory collection
//    var CommentsCol = Backbone.Collection.extend({
//        model: Comment
//    });
    
    var BlogView = Backbone.View.extend({model: "Blog"});
    
    //create instance of master view
//    var directory = new CommentView();
    var blogs = new BlogView();

} (jQuery));