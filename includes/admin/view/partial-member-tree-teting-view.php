<?php


    $mb = new Member();
    $results = $mb->getAll();
            
    //echo $cat->getOutput();
    $dropdown_html = '<select required id="blm_parent_select_memtree_view" name="blm[parentid]">
                    <option value="">' . __('Select a Parent', $this->plugin_text_domain) . '</option>';
                         
    foreach ($results as $result)
    {
        $memid = esc_html($result->getMemid());
        $first_name = esc_html($result->getFirstname());
        $last_name = esc_html($result->getLastname());
                
        $dropdown_html .= '<option value="' . $memid . '">( '. $memid .' )-' . $first_name . '  ' . $last_name . '</option>' . "\n";
    }
    
    $dropdown_html .= '</select>';

    $blm_add_meta_nonce_tree = wp_create_nonce('blm_get_tree_view_meta_form_nonce');
?>

<div id="wrap">

    <h2>Im from Member Tree</h2>
    
    <form action="" method="post" id="blm_get_tree_view_meta_ajax_form" >			

			<?php echo $dropdown_html; ?>
			<input type="hidden" name="action" value="blm_member_tree_response">
            <input type="hidden" name="blm_mem_tree_meta_nonce" value="<?php echo $blm_add_meta_nonce_tree ?>" />
			<input id="<?php echo $this->plugin_name; ?>-treeview_mem_id"  type="hidden" name="<?php echo "blm"; ?>[memid]" value="">
            <p class="submit"><input type="button" name="get_tree" id="get_tree" class="button button-primary" value="GET TREE"></p>
    </form>
    <div id="blm_form_feedback"></div>
    <canvas id="viewport" width="1000" height="800"></canvas>
<div id="blm_form_feedback"></div>
</div>

<script type="text/javascript">


    
jQuery( document ).ready( function( $ ) {

    "use strict";

    $('#get_tree').on('click',function() {
        
        var user_id = $('#binary-level-marketting-treeview_mem_id').val();

        //console.log(user_id);
        $.ajax({
            type:'POST',
            dataType: "json",
            url: params.ajaxurl,
            data:{action:'blm_member_tree_response', user_id:user_id, blm_mem_tree_meta_nonce:<?php echo "'".$blm_add_meta_nonce_tree. "'"; ?> },
            success:function(data) {
                console.log(data);
                var data = JSON.stringify(data);
                
                var Renderer = function (canvas) {
                    var canvas = $(canvas).get(0);
                    var ctx = canvas.getContext("2d");
                    var particleSystem;
                    var that = {
                        init: function (system) {
                            particleSystem = system;
                            particleSystem.screenSize(canvas.width, canvas.height);
                            particleSystem.screenPadding(100);
                            that.initMouseHandling();
                        },
                        redraw: function () {
                            ctx.fillStyle = "white";
                            ctx.fillRect(0, 0, canvas.width, canvas.height);
                            particleSystem.eachEdge(function (edge, pt1, pt2) {
                            ctx.strokeStyle = edge.data.linkcolor;
                            ctx.lineWidth = 3;
                            ctx.beginPath();
                            ctx.moveTo(pt1.x, pt1.y);
                            ctx.lineTo(pt2.x, pt2.y);
                            ctx.stroke();
                            });
                            particleSystem.eachNode(function (node, pt) {
                                ctx.beginPath();
                                ctx.arc(pt.x, pt.y, 15, 0, 2 * Math.PI);
                                ctx.fillStyle = node.data.color;
                                ctx.fill();
                                ctx.font = "18px Arial";
                                ctx.fillStyle = "#ff0000";
                                ctx.fillText(node.data.name, pt.x + 20, pt.y + 5);
                            });
                        },
                        initMouseHandling: function () {
                            var dragged = null;
                            var handler = {
                                clicked: function (e) {
                                    var pos = $(canvas).offset();
                                    var _mouseP = arbor.Point(e.pageX - pos.left, e.pageY - pos.top);
                                    dragged = particleSystem.nearest(_mouseP);
                                    if (dragged && dragged.node !== null) {
                                        dragged.node.fixed = true;
                                        //$(that).trigger({type:"navigate", path:selected.node.data.link})
                                    }
                                    $(canvas).bind('mousemove', handler.dragged);
                                    $(window).bind('mouseup', handler.dropped);
                                        return false;
                                    },
                                dragged: function (e) {
                                    var pos = $(canvas).offset();
                                    var s = arbor.Point(e.pageX - pos.left, e.pageY - pos.top);
                                    if (dragged && dragged.node !== null) {
                                        var p = particleSystem.fromScreen(s);
                                        dragged.node.p = p;
                                    }
                                    return false;
                                },
                                dropped: function (e) {
                                    if (dragged === null || dragged.node === undefined) return;
                                    if (dragged.node !== null) dragged.node.fixed = false;
                                    dragged.node.tempMass = 1000;
                                    dragged = null;
                                    $(canvas).unbind('mousemove', handler.dragged);
                                    $(window).unbind('mouseup', handler.dropped);
                                    _mouseP = null;
                                    return false;
                                }
                            };
                            $(canvas).mousedown(handler.clicked);
                        }
                    }
                    return that;
                }
                        
    
                    var theUI = {
                        nodes: data.nodes ,
                        edges: data.edges
                    }
                    
                    var sys = arbor.ParticleSystem(1000, 400, 1);
                    sys.parameters({ gravity:true });
                    sys.renderer = Renderer("#viewport");
                    sys.graft(data);

            }
        });
    });
}); 
  
</script>

<?php 