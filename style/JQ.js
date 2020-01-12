var num=0;

$().ready(function() {
    $('a').focus(function () {
        this.blur();
    })
    // $('#header ul li:first').css({"background-color":"#d3cfcf"});
    // $('#header ul li').click(function () {
    //     $('#header ul li').removeAttr("background-color");
    //     $(this).css({"background-color":"gray"});
    // })
    $('#header ul li').hover(
        function () {
            $(this).css({"background-color":"gray"});
        },
        function () {
            $(this).css({"background-color":"#d3cfcf"});
        }

    )
    num = $('#FanYe ul li').length;
    fenye();
    function fenye(){
        var currentPage = 1;

        var pageSize = 12;
        var total = num;

        var totalsize = 1;

        $(function() {
            if(total > 0){sufa();show();};
        })


        $(".layui-box").delegate(".pageNumber","click",function () {
            var no =  parseInt($(this).attr("data"));
            currentPage = no;
            sufa();
            show();
        })

        $(".pageSizeSelect").on('change',function(){
            pageSize = parseInt($(this).find("option:selected").val());
            currentPage = 1;
            sufa();
            show();
        })

        $(".layui-laypage-first").on('click',function(){
            if(currentPage != 1) {
                currentPage = 1;
                sufa();
                show();
            }
        })

        $(".layui-laypage-pre").on('click',function(){
            if(currentPage != 1) {
                currentPage = currentPage-1;
                sufa();
                show();
            }
        })

        $(".layui-laypage-next").on('click',function(){
            if(currentPage != totalsize) {
                currentPage = currentPage+1;
                sufa();
                show();
            }
        })

        $(".layui-laypage-last").on('click',function(){
            if(currentPage != totalsize) {
                currentPage = totalsize;
                sufa();
                show();
            }
        })

        function sufa() {
            var aa = [];
            aa.push(currentPage);
            totalsize =  Math.ceil(total/pageSize);
            for(var i=1 ;i<5;i++) {
                var a= currentPage+i;
                var b= currentPage-i;
                if(aa.length < 5) {
                    if(a<=totalsize) aa.push(a);
                    if(b>0) aa.push(b);
                }
            }
            aa.sort(function compare(val1,val2){return val1-val2;});

            var content = "";
            for(var i=0 ;i<aa.length;i++) {
                if(aa[i] == currentPage) {
                    content += "<a class=\"pageNumber aaa\" href='#' data='"+aa[i]+"'>"+aa[i]+"</a>";
                }else {
                    content += "<a class=\"pageNumber\" href='#' data='"+aa[i]+"'>"+aa[i]+"</a>";
                }
            }
            $(".pageNumber").remove();
            $(".layui-laypage-pre").after(content);
        }

        function show() {
            var count = (currentPage-1)*pageSize;

            $('#FanYe ul li').css({"display":"none"});
            for(var i=count;i<count+12;i++){
                if(i<=total){
                    $('#FanYe ul').find('li').eq(i).css({"display":"block"});
                }
            }
        }
    }


})