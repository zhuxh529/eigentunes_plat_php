//global variables
var baseUrl="";
var pid="";
$(document).ready(function() {
        var settings = {
            progressbarWidth: '180px',
            progressbarHeight: '4px',
            progressbarColor: '#22ccff',
            progressbarBGColor: '#eeeeee',
            defaultVolume: 0.8
        };
        $(".player").player(settings);

        $('.music_box_left').fancybox({
				arrows : false,
				type: 'iframe',
				'transitionIn'	:	'elastic',
				'transitionOut'	:	'elastic',
		'speedIn'		:	600, 
		'speedOut'		:	200, 
		'overlayShow'	:	false,
		'width'  : 1100,

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				},
				afterClose: function () { // USE THIS IT IS YOUR ANSWER THE KEY WORD IS "afterClose"
                parent.location.reload(true);
            }
			});

        $('.login_register_fancybox').fancybox({
				arrows : false,
				type: 'iframe',
				'transitionIn'	:	'elastic',
				'transitionOut'	:	'elastic',
		'speedIn'		:	600, 
		'speedOut'		:	200, 
		'overlayShow'	:	false,
		'width'  : "50%",
		'height': "70%",
		'autoSize':false,

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				},
				afterClose: function () { // USE THIS IT IS YOUR ANSWER THE KEY WORD IS "afterClose"
                parent.location.reload(true);
            }
			});

			
    });


function showReplies(obj, cid, commentStructure, mode, link){
		// setGlobaleVar(url, post_id);

		 console.log(obj);
		// console.log(cid);
		if(mode!=1){	
			obj.removeChild(obj.lastChild);
			link.innerHTML='显示回复';
    		link.setAttribute('href', '#');
    		link.setAttribute('onclick', 'showReplies(this.parentNode.parentNode,'+cid+','+JSON.stringify(commentStructure)+', 1, this); return false;');
			return;
		}

		if(commentStructure[cid]==undefined) return;
		// console.log(commentStructure[4][0]['content']);
		
		// console.log("i am outside");


		var node = document.createElement("div");
		node.className="commentDiv";
		

    	var hr =document.createElement("HR");
    	var br =document.createElement("BR");
    	for(var item in commentStructure[cid]){
    		console.log(item);
    		//console.log(commentStructure[cid]);
    		var each = document.createElement("div");
			each.className="commentEach";

    		hr =document.createElement("HR");
    		br =document.createElement("BR");
    		var h3 = document.createElement("H3");
    		var t = document.createTextNode(commentStructure[cid][item]['subject']);
    		h3.appendChild(t);
    		each.appendChild(h3);
			t = document.createTextNode("内容："+commentStructure[cid][item]['content']);
			var p=document.createElement("p");
			p.appendChild(t);
			each.appendChild(p);
			var line =document.createElement("HR");
			

			var right = document.createElement("div");
			right.setAttribute("align","right");
			p=document.createElement("p");
			console.log(obj);
			var count=commentStructure[commentStructure[cid][item]['id']]==undefined?0:Object.keys(commentStructure[commentStructure[cid][item]['id']]).length;
			p.innerHTML=count+'条回复';
			right.appendChild(p);
			each.appendChild(br);
			each.appendChild(right);
			// console.log(node);

			right = document.createElement("div");
			right.setAttribute("align","right");
			newlink = document.createElement('a');
			newlink.className='login_register_fancybox';
			newlink.setAttribute('href', baseUrl+'?r=post/postComment&pid='+pid+'&parent_comment_id='+commentStructure[cid][item]['id']);
			newlink.innerHTML='回复';
			right.appendChild(newlink);
			each.appendChild(br);
			each.appendChild(right);



			right = document.createElement("div");
			right.setAttribute("align","right");
			newlink = document.createElement('a');
			newlink.setAttribute('href', '#');
			newlink.setAttribute('onclick', 'showReplies(this.parentNode.parentNode,'+commentStructure[cid][item]['id']+','+JSON.stringify(commentStructure)+', 1, this);return false;');
			newlink.innerHTML='显示回复';
			right.appendChild(newlink);
			each.appendChild(right);
			each.appendChild(hr);
			
			
    		node.appendChild(each);
    		obj.appendChild(node);
    		
    	}
    	link.innerHTML='关闭回复';
    	link.setAttribute('href', '#');
    	link.setAttribute('onclick', 'showReplies(this.parentNode.parentNode,'+cid+','+JSON.stringify(commentStructure)+', 0, this); return false;');

		
		// var textnode = document.createTextNode("hahahhahahhahhahahhahahahah"); 
		// node.appendChild(textnode);
		// obj.appendChild(node);

};

function setGlobaleVar(url, post_id){
	baseUrl=url;
	pid=post_id;
}



