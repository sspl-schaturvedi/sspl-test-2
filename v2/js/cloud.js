
(function(a)
{
	"use strict",a.fn.jQCloud=function(b,c)
	
{
	var d=this,e=d.attr("id")||Math.floor(Math.random()*1e6).toString(36),
	f={width:d.width(),height:d.height(),center:{x:(c&&c.width?c.width:d.width())/2,y:(c&&c.height?c.height:d.height())/2},
	delayedMode:b.length>18,shape:!1};
	c=a.extend(f,c||{}),d.addClass("jqcloud").width(c.width).height(c.height),d.css("position")==="static"&&d.css("position","relative");
	var g=function()
	{
		var f=function(a,b)
		{
			var c=function(a,b)
			{
				return Math.abs(2*a.offsetLeft+a.offsetWidth-2*b.offsetLeft-b.offsetWidth)<a.offsetWidth+b.offsetWidth&&Math.abs(2*a.offsetTop+a.offsetHeight-2*b.offsetTop-b.offsetHeight)<a.offsetHeight+b.offsetHeight?!0:!1
				},
				d=0;for(d=0;d<b.length;d++)if(c(a,b[d]))return!0;return!1
				};
				for(var g=0;g<b.length;g++)b[g].weight=parseFloat(b[g].weight,10);
				b.sort(function(a,b)
				{
					return a.weight<b.weight?1:a.weight>b.weight?-1:0
					});
					var h=c.shape==="rectangular"?18:2,i=[],
					j=c.width/c.height,
					k=function(g,k)
					{
						var l=e+"_word_"+g,
						m="#" + l,
						n=6.28*Math.random(),
						o=0,
						p=0,
						q=0,
						r=5,
						s="",
						t="",
						u="";
						k.html=a.extend(k.html,{id:l}),k.html&&k.html["class"]&&(s=k.html["class"],
						delete k.html["class"]),
						b[0].weight>b[b.length-1].weight&&(r=Math.round((k.weight-b[b.length-1].weight)/(b[0].weight-b[b.length-1].weight)*9)+1),
						u=a("<span>").attr(k.html).addClass("w"+r+" "+s),
						k.link?(typeof k["link"]=="string"&&(k.link={href:k.link}),
						k.link=a.extend(k.link,
						{
							href:encodeURI(k.link.href).replace(/'/g,"%27")
							}),
							t=a("<a target='_blank' class='g-id-"+(g+1)+"'>").attr(k.link).text(k.text)):t=k.text,u.append(t);
							if(!!k.handlers)for(var v in k.handlers)k.handlers.hasOwnProperty(v)&&typeof k.handlers[v]=="function"&&a(u).bind(v,k.handlers[v]);
							d.append(u);
							var w=u.width(),
							x=u.height(),
							t=u.height(),
							y=c.center.x-w/2,
							z=c.center.y-x/2,
							A=u[0].style;
							A.position="absolute",
							A.left=y+"px",
							A.top=z+"px";
							
							while(f(document.getElementById(l),i))
							{
								if(c.shape==="rectangle")
								{
									p++,p*h>(1+Math.floor(q/2))*h*(q%4%2===0?1:j)&&(p=0,q++);
									switch(q%4)
									{
										case 1:y+=h*j+Math.random()*2;
										break;
										case 2:z-=h+Math.random()*2;
										break;
										case 3:y-=h*j+Math.random()*2;
										break;
										case 0:z+=h+Math.random()*2}
										}
										else o+=h,
										n+=(g%2===0?1:-1)*h,y=c.center.x-w/2+o*Math.sin(n)*j,
										z=c.center.y+o*Math.cos(n)-x/2;
										A.left=y+"px",
										A.top=z+"px"}i.push(document.getElementById(l)),a.isFunction(k.afterWordRender)&&k.afterWordRender.call(u)},
										l=function(e)
										{
											e=e||0,e<b.length?(k(e,b[e]),setTimeout(function()
											{
												l(e+1)},100)):a.isFunction(c.afterCloudRender)&&c.afterCloudRender.call(d)
												};
												c.delayedMode?l():(a.each(b,k),a.isFunction(c.afterCloudRender)&&c.afterCloudRender.call(d))
												};
												return setTimeout(function()
												{
													g()
													}
													,100),d
													}
													}
													)(jQuery);