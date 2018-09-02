const HUB = {
    url : 'https://hub.myfood.eu/opendata/productionunits/stats',
    setupStatsData: ()=>{

        // script = document.createElement("script");
        // script.type = "text/javascript";
        // script.src = "https://hub.myfood.eu/opendata/productionunits/stats?callback=stats_data_callback";
        // window.statsDataCallback = function(data){
        //     console.log(data)
        // }


        // $.ajax({
        //     url: 'https://hub.myfood.eu/opendata/productionunits/stats',
        //     dataType:'jsonp',
        //     jsonpCallback:'stats_data_callback',
        //     jsonp: 'callback',
        //     success: (data)=>{
        //         console.log(data)
        //
        //         $('#stat-value-production-unit-number').text(data.ProductionUnitNumber);
        //         $('#stat-value-total-monthly-production').text(data.TotalMonthlyProduction);
        //         $('#stat-value-total-spared-co2').text(data.TotalMonthlySparedCO2);
        //
        //     },
        //     error: (error) => {
        //         console.log(error);
        //     }
        // });

        // $.getJSON("https://hub.myfood.eu/opendata/productionunits/stats?callback=?", function(result){
            // alert(result);
        // });
    }
}
