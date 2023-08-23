<?php

    //$data=array();
                    
    $mtree = new MemberTree();
    $mtree->getMemberTree(1234);
    $nodes_ = $mtree->getNode();
    $edges_ = $mtree->getEdge();
    $parent_ = $mtree->getParent();
    
    json_encode($nodes_);
    json_encode($edges_);
    //array_push($data, $nodes_, $edges_);
    //$data['nodes'] = $nodes_;
    //$data['edges'] = $edges_;
                
    //$rsl = json_encode($data);

?>



<div id="wrap">

    <h2>Im from Member Tree</h2>

    <canvas id="viewport" width="1000" height="800"></canvas>

</div>

<script type="text/javascript" >
    // site.js
    // the arbor.js website
    //
jQuery( document ).ready(function ($) {
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
                                                _mouseP = arbor.Point(e.pageX - pos.left, e.pageY - pos.top);
                                                dragged = particleSystem.nearest(_mouseP);
                                                if (dragged && dragged.node !== null) {
                                                        dragged.node.fixed = true;
                                                        //$(that).trigger({type:"navigate", path:selected.node.data.link})
                                                        //$(that).tooltip();
                                                        
                                                        //var id=dragged.node.name;
                                                        //alert('Node selected: ' + id);
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
        
       
            
            var data = {
                nodes: <?php echo $nodes_; ?> ,
                edges: <?php echo $edges_; ?>
            }
            
            var sys = arbor.ParticleSystem(700, 700, 0.5);
            sys.parameters({ gravity:false});
            sys.renderer = Renderer("#viewport");
            sys.graft(data);

      
});


</script>

<?php 

