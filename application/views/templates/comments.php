<div class="col-xs-12">
<div class="row">
    
    <div class="col-xs-12">
        <div class="row">
        <div class="col-sm-8">
        <h3>Post a Comment</h3>
        <hr>
        <?php $CI =& get_instance();?>
        <?php $attributes = array('onsubmit' => 'return postComment(\'email1\', \'password1\', \'txt1\', \'#div_email1\', \'#div_pass1\', \'#div_comment1\');');?>
        <?php echo form_open(site_url('comments/index/'.$CI->uri->segment(1).'/'.$this->uri->segment(2).'/'.$CI->uri->segment(3)), $attributes);?>
        <input id="nick1" name="nick" type="text" class="form-control">
        <input id="reply" name="reply" type="hidden" value="0" class="form-control">
        
        <label id="label1">
            <input id ="check1" type="checkbox" style="margin-top: 1%;" value="0" name="anonymous" onchange="anonymous1('check1', 'nick1');"> 
            <i>Post as Anonymous</i>
        </label>
        <div id="div_comment1">
        <textarea id="txt1" class="form-control" name="comment" type="text" style="margin-top: 1%; height: 150px"
                  placeholder="comment" onclick="hidea(3, '#div_comment1');"></textarea>
        </div>
        <input id = "button1" type="submit" value="Post" style="margin-top: 1%;"  class="btn btn-primary"/>
        <?php echo form_close();?>
        </div>
        </div>
<!--        <div class="row"><div class="col-sm-12"><span class="h3">Comments </span></div>-->
        <h3>Comments 
            <a class="h3 pull-right" style="text-decoration: none;" class="my-button" onclick="refresh()"><span class="glyphicon glyphicon-refresh"></span>
            </a>
        </h3>
            

<!--            
            <button type="button" class="btn btn-default dropdown-toggle pull-right"  data-toggle="dropdown">
      Oldest
      <span class="caret"></span></button>
      <ul class="dropdown-menu pull-right" role="menu" style="float: right">
      <li><a href="#">Newest</a></li>
      <li><a href="#">Oldest</a></li>
      </ul>-->
    <!--</div>-->
        <hr>
    
            
</div>
    </div>

    <div id="tag1" class="" style="margin-bottom: 4%;  font-family: cursive;">
</div>
            <script>
            $('#tag1').html('<img id=\"gif_load\"src="<?php echo base_url('b/loading.gif');?>" style=\"margin: 0px auto;\" />');
            $(document).ready(

                function poll() {
//                        load_new_comments();
                    setTimeout('load_new_comments()', 1000);
                }

                );
            
            function anonymous1(c1, n1) {
                if(document.getElementById(c1).checked) {
                    document.getElementById(n1).setAttribute('value', 'Anonymous');
                    
                }
            }
            function hidea(i, d1, dp1, dc1) {
                if(i === 1) {
                    $(d1).removeClass('has-error');
                }
                if(i === 2) {
                    $(dp1).removeClass('has-error');
                }
                if(i === 3) {
                    $(dc1).removeClass('has-error');
                }
            }
            function showPassword(ta) {
                
                document.getElementById(ta).style.display = "anything";
//                document.getElementById("password1").style.visibility = "visible";
                document.getElementById(ta).setAttribute("style",
                                        "margin-bottom: 1%;margin-top: 1%;");
            }
            
            function postComment(e, p, t, divE, divP, divC) {
                if(document.getElementById(e).value != ''
                        && document.getElementById(p).value != ''
                        && document.getElementById(t).value != '') {
                return true;
                }
                else {
                    if(document.getElementById(t).value == '') {
                        $(divC).addClass("has-error");
                        return false;
                    }
                    return true;
                }
            }
            
            function load_new_comments() { 

                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('comments/get_comments/'.$CI->uri->segment(1).'/'.$CI->uri->segment(3)); ?>",

                }).done(function (data) { 
//                            alert(data);
                    var obj = jQuery.parseJSON(data);
                    if(obj.length == 0) {
                        $("#tag1").append("<div class=\"\">No comments yet</div><br>");
                    }
                    $("#tag1").append("<div class=\"col-sm-12\">");
                    comment = Array();
                    for (var i = 0; i < obj.length; i++) {
                        comment[i] = false;
                        
var extra = obj[i]['reply'] === "1" ? "<div class = \"col-sm-1\"></div><div class=\"col-sm-11 comment-1\">":"<div class=\"col-sm-12 comment-1\">";
                        $("#tag1").append("<div class = \"\">"+extra
                                +"<div class=\"col-sm-12\" style=\"margin-top: 1%;\" ><b style=\"color:#000;\">"+obj[i]['nick']
                                +"</b>"
                                +"<a id=\"reply-button-"+i+"\" class=\"my-button\" onclick=\"showCommentsForm('#comment-"+i+"', "+i
                                +","+obj[i]['comment_id']+")\"><span class=\"glyphicon glyphicon-share-alt\"  style=\" float:right;\">"+"</span></a>"
                                +" <i style=\"margin-right: 2%; color:#000; float:right;\">"+obj[i]['pubdate']+"</i>"

                                +"<hr><div>"
                                +"<p style=\"color:#000;\">"+obj[i]['comment']+"</p>"
                                +"</div></div></div><div id=\"comment-"+i+"\"></div></div>"
                                );
                    }
                    $("#tag1").append("</div>");
            $('#gif_load').fadeOut(10);
                            }
                        );
            }
            function refresh() {
                $('#tag1').html('<img id=\"gif_load\"src="<?php echo base_url('b/loading.gif'); ?>" style=\"margin: 0px auto;\" />');
                load_new_comments();
            }
            
            function showCommentsForm(t, i, id) {
                if(comment[i] === true) {
                    $(t).html('');
                    $('#reply-button-'+i).addClass('my-button');
                    $('#reply-button-'+i).removeClass('m-active');
                    
                    comment[i] = false;
                }
                else {
                    $('#reply-button-'+i).addClass('m-active');
                    $('#reply-button-'+i).removeClass('my-button');
        $(t).html('<form action="http://localhost/cms/public_html/comments/index/'+
                '<?php echo $CI->uri->segment(1).'/'.$this->uri->segment(2).'/'.$CI->uri->segment(3);?>"'
                +' method="post" accept-charset="utf-8" onsubmit="return postComment(\'email-rep-'
                +i+'\', \'pass-rep-'+i+'\', \'txt-rep-'+i+'\', \'#div_email_rep_'
                +i+'\', \'#div_pass_rep_'+i+'\', \'#div_comment_rep_'+i+'\');">'
        +'<input id=\"nick-rep-'+i+'\" name=\"nick\" type=\"hidden\" value=\"'+
            " class=\"form-control\">"
        +'<input id=\"reply\" name=\"reply\" type=\"hidden\" value=\"1\" class=\"form-control\">'
        +'<input id=\"comment-id-'+i+'\" name=\"comment_id\" type=\"hidden\" value=\"'+id
        +'\" class=\"form-control\">'
        +"</div>"
        +"<label id=\"label1\">"
            +"<input id =\"check-rep-"+i+"\" type=\"checkbox\" style=\"margin-top: 1%;\" value=\"0\""
            +" name=\"anonymous\" onchange=\"anonymous1('check-rep-"+i+"', 'nick-rep-"+i+"');\">" 
            +"<i>Post as Anonymous</i>"
        +"</label>"
        +"<div id=\"div_comment_rep_"+i+"\">"
        +"<textarea id=\"txt-rep-"+i+"\" class=\"form-control\" name=\"comment\" type=\"text\" style=\"margin-top: 1%; height: 150px\""
                  +"placeholder=\"comment\" onclick=\"hidea(3, '#div_email_rep_"
        +i+"' ,'#div_pass_rep_"+i+"','#div_comment_rep_"+i+"');\"></textarea>"
        +"</div>"
        +"<input id = \"button1\" type=\"submit\" value=\"Post\" style=\"margin-top: 1%;\"  class=\"btn btn-primary\"/>"
        +"<?php echo form_close();?>");
        comment[i] = true;
}
            }
            </script>
</div>