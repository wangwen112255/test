    function _openLayerUrl(url,title,width,height,offset)
{
 // var  loads=layer.load();
 // setTimeout(function(){
 // layer.close(loads);
 // },1000);
 var width=width||'100%';
 var height=height||'100%';
 var offset=offset||'0px';

 var title=title||'操作';
 layer.open({
   type: 2,
   anim: 2,
   title: title,
   content: url,
   //offset
   // shadeClose: true,
   area: [width,height],
   maxmin: false,
   success:function(layero,index){
   	var body = layer.getChildFrame('body', index);
    var iframeWin = window[layero.find('iframe')[0]['name']]; //得到iframe页的窗口对象，执行iframe页的方法：iframeWin.method();
    //alert(body.html()); //得到iframe页的body内容
    // // body.find('input').val('Hi，我是从父页来的')
 
  },
  end: function(){
  // _layOpenSuccess();
  // alert("end");
   }

 })
}   

    function _layCloseIframe(){
    var index=parent.layer.getFrameIndex(window.name);
    parent.layer.close(index);
    } 
    function _ajaxError(){
      layer.alert('连接失败，服务器开小差了', {icon: 5},function(index){
        layer.close(index);
        window.location.reload();}); 
    }
    function _ajaxSuccess(data){
      if(data.code==200){
        layer.msg(data.msg,{icon:1});
        setTimeout(function(){
          window.parent.location.reload();
            // _layCloseIframe();
        },1500);
        }
      else{
        if(data.msg){
        layer.alert(data.msg, {icon: 5},function(index){
        layer.close(index);
        window.location.reload(); }); 
        }else{ 
        layer.alert('连接失败，服务器开小差了', {icon: 5},function(index){
        layer.close(index);
        window.location.reload(); }); 
        }
      }
    }
  
    function _ajax(objajax){
      var url=objajax.url;
      var type=objajax.type||'post';
      var data=objajax.data;
      var success=objajax.success||_ajaxSuccess;
      var error=objajax.error||_ajaxError;
      var selector=objajax.id;
      $.ajax({
        'url':url,
        'type':type,
        'data':data,
        'datatype':'json',
         success:success,
         error:error,
      
      })

    }

    function _validadeCallback(form){
     $(form).find('button').eq(0).html("正在提交中<span style='font-size:18px' class='fa fa-spinner fa-spin'></span>").addClass('disabled');
     // layer.load();
      _ajax({
          url:$(form).attr("action"),
          data:$(form).serialize(),
          id:form
          })
        
        }

    function _validade(objform){
    var rule=objform.rules;
    var message=objform.messages;
    var id=objform.id||'signupForm';
    var submitHandler=objform. callback||_validadeCallback;
    var errorclass=objform.class;
    $("#"+id).validate({
        rules:rule,
        messages:message,
        submitHandler:submitHandler,
        errorClass : errorclass,
        errorPlacement: function(error, element) {  
          // element.parent().parent().removeClass('has-success');
          // element.parent().parent().addClass('has-error');
          error.appendTo(element.parent().parent());  
        },
        success:function(label){
        // label.parent().removeClass('has-error');
        // label.parent().addClass('has-success');
        label.html("<span  style='font-size:18px;color:green;' class='fa fa-check'></span>");
        },
       // errorContainer: "#errors",
       // errorLabelContainer: $("#errors"),
       // wrapper: "li",
     })
    }
    //状态改变
  function _SwitchStatus(jscheck){

    var switches=$(jscheck);
    for(var i=0;i<switches.length;i++){
          new Switchery($(jscheck)[i], {
             
          }); 
          $(jscheck).eq(i).change(function() {
           if(this.checked){
              $(this).siblings('input').val(1);
              //console.log($(this).next().next());
             }
             else{
             $(this).siblings('input').val(0);
             }
           });
    }
  
    } 
    //改变状态
        function _setStatus(id,url){
        layer.confirm("您确定要修改状态吗？",{'btn':['确定','取消']},function(index){
              _ajax({
                'url':url,
                'data':{'id':id},
                success:function(data){
                  if(data.code===200){
                    layer.msg(data.msg,{icon:1,time:700});
                    $("#status"+id).html(data.data);
                     var c=$("#status"+id).attr("class");
                     c=(c=='btn btn-default')?"btn btn-info":"btn btn-default";
                    $("#status"+id).attr("class",c);
                  }
                  else{
                    layer.alert(data.msg,{icon:5});
                  }
                }

            });
              layer.close(index);
        })

        }
        //
         function _del(id,url){
        layer.confirm("您确定要删除吗？",{'btn':['确定','取消']},function(index){
              _ajax({
                'url':url,
                'data':{'id':id},
                success:function(data){
                  if(data.code===200){
                    layer.msg(data.msg,{icon:1,time:700});
                    $("#del"+id).parent().parent().remove();
                  }
                  else{
                   layer.alert(data.msg,{icon:5});
                  }
                }

            });
              layer.close(index);
        })

        }
