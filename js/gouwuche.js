$(function(){
	var lis0 = document.querySelectorAll(".shu0");
	var lis1 = document.querySelectorAll(".shu1");
	var lis2 = document.querySelectorAll(".shu2");
	var lis3 = document.querySelectorAll(".shu3");
	var lis4 = document.querySelectorAll(".shu4");
	var lis5 = document.querySelectorAll('.kuang1');
	var lis6 = document.querySelectorAll('.tew');
	var lis9 = document.querySelector('.zhong');
	var s1 = document.querySelector('.span1');
	var s2 = document.querySelector('.span2');
//	move1()
//	move2()
//	function move1() {
//		var shuzi=parseInt(lis4[0].innerHTML)+
//			      parseInt(lis4[1].innerHTML)+
//			      parseInt(lis4[2].innerHTML)+
//			      parseInt(lis4[3].innerHTML);
//	    s2.innerHTML='合计：'+shuzi+'元'
//	    s2.style.fontSize='25px';
//	    s2.style.color='orange';
//	    s2.style.fontWeight='600';
//	}
//	function move2() {
//		var quan=parseInt(lis2[0].innerHTML)+
//				 parseInt(lis2[1].innerHTML)+
//				 parseInt(lis2[2].innerHTML)+
//				 parseInt(lis2[3].innerHTML);
//	    s1.innerHTML="共"+quan+"件商品 已选"+quan+"件商品"
//	}
	for(var i=0;i<lis5.length;i++){
		lis1[i].x = i;
		lis1[i].onclick = function(){
            if(parseInt(lis2[this.x].innerText)<1){
                lis2[this.x].innerText=1
            }else if(parseInt(lis2[this.x].innerText)>1){
                lis2[this.x].innerText=parseInt(lis2[this.x].innerText)-1
            }
			lis4[this.x].innerText = parseInt(lis0[this.x].innerText)*
				                     parseInt(lis2[this.x].innerText)+'元';
		
		
	    }
		lis3[i].x = i;
		lis3[i].onclick = function(){
			if(parseInt(lis2[this.x].innerText)>10){
                lis2[this.x].innerText=10
            }else if(parseInt(lis2[this.x].innerText)<10){
               	lis2[this.x].innerText=parseInt(lis2[this.x].innerText)+1
            }
			lis4[this.x].innerText = parseInt(lis0[this.x].innerText)*
				                     parseInt(lis2[this.x].innerText)+'元';
//		move1()
//		move2()
		}
		lis6[i].x = i ;
		lis6[i].onclick = function(){
//			lis9.removeChild(lis9.childNodes[this.x])//删除子节点
            var ui=confirm('确定删除该商品吗？')
            if(ui==true){
            	lis5[this.x].remove();
            }
        }
	}
	$('input')[0].onclick = function(){
		for(var j=0;j<$('input').length;j++){
			$('input')[j].checked ='';
		}
	}
})
