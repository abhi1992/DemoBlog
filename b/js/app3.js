var app = app || {};

//    //demo data
//    app.comments = [
//        { pub_date: "", comment: "Some comment" },
//        { nick: "C", pub_date: "", comment: "Some comment" },
//        { nick: "Abh", pub_date: "", comment: "Some comment" },
//        { nick: "Awe", pub_date: "", comment: "Some comment" },
//        { nick: "Dude", pub_date: "", comment: "Some comment" },
//    ];
//    
//    app.blogs = [{ blog: "gjhbkj", nick: "C", pub_date: "lhkj", title: "ent" },];
    
    //define product model
    app.Comment = Backbone.Model.extend({
        defaults: {
            nick:"Anonymous"
        }
    });
    
    app.Blog = Backbone.Model.extend({
        defaults: {
            nick:"Anonymous",
            pub_date: "kjhjughjghjghjghjgjhgjhfghfgh", 
            blog: "Some comment"
        }
    });
    
    //define directory collection
    app.Comments = Backbone.Collection.extend({
        model: app.Comment
    });

    app.Blogs = Backbone.Collection.extend({
        model: app.Blog,
        url: "api/blog/9",
        
    });
    app.BlogView = Backbone.View.extend({
        
        tagName: "blog",
        className: "blog-container",
        template: $("#blogTemplate").html(),
        render: function () {
            var tmpl = _.template(this.template);
            
            $(this.el).html(tmpl(this.model.toJSON()));
            return this;
        }
    });
    
    //define individual contact view
    app.CommentView = Backbone.View.extend({
        tagName: "comment",
        className: "comment-container",
        template: $("#commentTemplate").html(),

        render: function () {
            var tmpl = _.template(this.template);
            
            $(this.el).html(tmpl(this.model.toJSON()));
            return this;
        }
    });

    //define master view
    app.CommentsView = Backbone.View.extend({
        el: $("#comments"),

        initialize: function () {
            this.collection = new app.Comments(app.comments);
            this.render();
        },

        render: function () {
            var that = this;
            _.each(this.collection.models, function (item) {
                that.renderComment(item);
            }, this);
        },

        renderComment: function (item) {
            app.commentView = new app.CommentView({
                model: item
            });
            this.$el.append(app.commentView.render().el);
        }
    });
      
    
    app.BlogsView = Backbone.View.extend({
        el: $("#blogs"),

        initialize: function () {
            this.collection = new app.Blogs(app.blogs);
//            this.collection.fetch();//{reset:true}
            this.render();
//            this.listenTo( this.collection, 'reset', this.render );
        },

        render: function () {
            var that = this;
            _.each(this.collection.models, function (item) {
                that.renderBlog(item);
            }, this);
        },

        renderBlog: function (item) {
            var blogView = new app.BlogView({
                model: item
            });
            this.$el.append(blogView.render().el);
        }
    });

    //create instance of master view
    