
<div class="infocard">

    <div class="content_x" id="page-1">
        <div class="title-content-card-top4" style="height: 30px;"><span class="text-title-Content-card-top" style="display: block; height: 30px; line-height: 25px;">
                <h2>Credit Card Repayment Calculator </h2>
            </span></div>
        <script>
            function isValid(entry, a, b) {
                if (isNaN(entry.value) || (entry.value == null) || (entry.value == "") || (entry.value < a) || (entry.value > b)) {
                    alert("Invalid entry. Your min payment should be between " + a + " and " + b + ".")
                    entry.focus()
                    entry.select()
                    return false
                }
                return true
            }

            function validentry(a) {
                if (isNaN(a) || (a == null) || (a == ""))
                    return false
                else
                    return true
            }

            function numberWithCommas(n) {
                var parts = n.toString().split(".");
                return parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",") + (parts[1] ? "." + parts[1] : "");
            }


            function calculate() {

                // send entries to validation function
                // exit if not valid
                t_bal = document.getElementById('t_bal');
                h_apr = document.getElementById('h_apr');
                if (!isValid(t_bal, 0, 100000)) {
                    return false
                } else if (!isValid(h_apr, 0, 30)) {
                    return false
                } else {
                    var init_bal = eval(t_bal.value);
                }
                var m_pay = init_bal * .02;
                if (m_pay < 20)
                    m_pay = 20;
                document.getElementById('estpay').innerHTML = "$" + numberWithCommas(round(m_pay));
                // variables used in calculation
                var cur_bal = init_bal;		// used in loop
                var interest = eval(h_apr.value / 100);
                var mnth_pay = m_pay;
                var fin_chg = 0;			// finance charge
                var num_mnths = 0;
                var tot_int = 0;



                while (cur_bal > 0) {
                    fin_chg = cur_bal * interest / 12;
                    cur_bal = cur_bal - mnth_pay + fin_chg;
                    mnth_pay = cur_bal * .02;
                    if (mnth_pay < 20)
                        mnth_pay = 20;
                    num_mnths++;
                    if (num_mnths > 40000) {
                        alert("We are interrupting this process to prevent a hang which may result with a very high balance and high interest rate.")

                        return
                    }
                    tot_int += fin_chg;
                }

                // display result
                document.getElementById('resultdiv1').style.display = "block";
                document.getElementById('paysoonerdiv').style.display = "block";
                document.getElementById('balanceinit').innerHTML = "$" + numberWithCommas(round(t_bal.value));
                document.getElementById('percentinit').innerHTML = h_apr.value + "%";
                var years = Math.floor(num_mnths / 12); // 1

                var remainingMonths = num_mnths % 12; // 6
                var monthstring = "";
                if (remainingMonths > 0)
                    monthstring = " and " + remainingMonths + " months";
                if (years > 1)
                    document.getElementById('timetopayoff').innerHTML = years + " years" + monthstring;
                else if (years == 1)
                    document.getElementById('timetopayoff').innerHTML = years + " year" + monthstring;
                else
                    document.getElementById('timetopayoff').innerHTML = num_mnths + " months";
                document.getElementById('totalamount').innerHTML = "$" + numberWithCommas(round(init_bal + tot_int));
                document.getElementById('totalinterest').innerHTML = "$" + numberWithCommas(round(tot_int));
            }
            function PMT(i, n, p) {
                return i * p * Math.pow((1 + i), n) / (1 - Math.pow((1 + i), n));
            }
            function calculatewyears() {
                num_years = document.getElementById('num_years');
                if (validentry(num_years.value) && num_years.value > 0)
                {
                    t_bal = document.getElementById('t_bal');
                    h_apr = document.getElementById('h_apr');
                    var init_bal = eval(t_bal.value);
                    var init_perc = eval(h_apr.value / 100);
                    var perc = init_perc / 12;
                    var periods = eval(num_years.value);
                    periods = periods * 12;

                    var mont = PMT(perc, periods, init_bal) * -1;
                    var totinterest = (mont * periods) - init_bal;
                    document.getElementById('payamtneeded').innerHTML = "$" + numberWithCommas(round(mont));
                    document.getElementById('totalinterestwyears').innerHTML = "$" + numberWithCommas(round(totinterest));
                    document.getElementById('hidresult1').style.display = "block";
                }
                else
                    alert('Please check your entries!');
            }

            function calculatewpay() {

                // send entries to validation function
                // exit if not valid
                t_bal = document.getElementById('t_bal');
                h_apr = document.getElementById('h_apr');
                pay_amt = document.getElementById('pay_amt');
                if (!isValid(t_bal, 0, 100000)) {
                    return false
                } else if (!isValid(h_apr, 0, 30)) {
                    return false
                } else {
                    var init_bal = eval(t_bal.value);
                }
                if (validentry(pay_amt.value))
                {
                    var m_pay = pay_amt.value;

                    // variables used in calculation
                    var cur_bal = init_bal;		// used in loop
                    var interest = eval(h_apr.value / 100);
                    var mnth_pay = m_pay;
                    var fin_chg = 0;			// finance charge
                    var num_mnths = 0;
                    var tot_int = 0;



                    while (cur_bal > 0) {
                        fin_chg = cur_bal * interest / 12;
                        cur_bal = cur_bal - mnth_pay + fin_chg;

                        num_mnths++;
                        if (num_mnths > 40000) {
                            alert("We are interrupting this process to prevent a hang which may result with a very high balance and high interest rate.  Try entering a higher payment amount.")

                            return
                        }
                        tot_int += fin_chg;
                    }

                    // display result
                    document.getElementById('hidresult').style.display = "block";
                    var years = Math.floor(num_mnths / 12); // 1

                    var remainingMonths = num_mnths % 12; // 6
                    var monthstring = "";
                    if (remainingMonths > 0)
                        monthstring = " and " + remainingMonths + " months";
                    if (years > 1)
                        document.getElementById('timetopayoffwpay').innerHTML = years + " years" + monthstring;
                    else if (years == 1)
                        document.getElementById('timetopayoffwpay').innerHTML = years + " year" + monthstring;
                    else
                        document.getElementById('timetopayoffwpay').innerHTML = num_mnths + " months";
                    document.getElementById('totalamountwpay').innerHTML = "$" + numberWithCommas(round(init_bal + tot_int));
                    document.getElementById('totalinterestwpay').innerHTML = "$" + numberWithCommas(round(tot_int));
                }
                else
                    alert('Please check your entries!');
            }

            // round to 2 decimal places
            function round(x) {
                return Math.round(x * 100) / 100;
            }
        </script>
        <div class="content-card-text-infomation">
            <div class="content-apply-text4">            
                <div class="body3">
                    Want to know how long it will take you to pay off your credit card balance if I make only the minimum payment?<br><Br>

                    Based on your information, the calculator can give you an estimated length of time it will take you to pay off your credit card balance.
                    <br><br><h3>Enter your information:</h3>
                    <div>

                        $ <input type=text name="t_bal" id="t_bal" value="0"> My total balance<br><Br>
                        % <input type=text name="h_apr" id="h_apr" value="0"> My highest annual percentage rate (APR) with a balance<Br><bR>

                    </div>
		    <button class="applybtn" onclick="calculate();"><span>Calculate</span> 
                        <img class="img-arrow" src="<?php echo $sitelink ?>/images/arrowbtn.png">
		    </button>

    
		    

		  

                    <div id="resultdiv1" style="display:none">
                        <br>Estimated initial minimum payment: <b><label id="estpay"></label>
                        </b>
                        <br>Total time to pay off your balance: <b><label id="timetopayoff"></label>
                        </b>
                        <Br>Total amount payed in that time: <b><label id="totalamount"></label></b>
                        <Br>Total interest payed in that time: <b><label id="totalinterest"></label>
                        </b><Br>
                    </div>
                    <div id="paysoonerdiv" style="display:none; text-align:left">
                        <br />
                        <h1></h1>
                        <p style="font-size:16px"><b>How do I pay off my credit card balance sooner?</b></p>
                        The following esitmates are based on your balance of <label id="balanceinit"></label> at <label id="percentinit"></label>
                        <br />
                        <table align="left" style="border:1px solid #ebebeb;position: relative;top:10px;background-color:#f7f7f7; padding-left: 5px;
padding-bottom: 8px;">
                            <tr style="vertical-align:top">
                                <td>
                                    <br />
                                     &nbsp;I want to pay off my credit card balance in a specific number of years:
				     <input type=text name=t_bal id="num_years" width="20" value="0"><br /><br />
				     <button class="applybtn" onclick="calculatewyears();"><span>Calculate</span> 
					<img class="img-arrow" src="<?php echo $sitelink ?>/images/arrowbtn.png">
				     </button>
                                    <br />
                                    <br />
                                    <div  id="hidresult1" style="display:none;">
                                        Amount you would need to pay each month to pay off your balance in the time above: <b><label id="payamtneeded"></label></b>
                                        <Br>Total interest payed in that time: <b><label id="totalinterestwyears"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr style="vertical-align:top">
                                <td ">
                                    <br />
                                     &nbsp;I want to pay a specific amount each month: $
				     <input type=text name=t_bal id="pay_amt" width="20" value="0"><br /><br />
				     <button class="applybtn" onclick="calculatewpay();"><span>Calculate</span> 
					<img class="img-arrow" src="<?php echo $sitelink ?>/images/arrowbtn.png">
				     </button>
                                    <br />
                                    <br />
                                    <div  id="hidresult" style="display:none;">
                                        Total time to pay off your balance: <b><label id="timetopayoffwpay"></label>
                                        </b>
                                        <Br>Total amount payed in that time: <b><label id="totalamountwpay"></label></b>
                                        <Br>Total interest payed in that time: <b><label id="totalinterestwpay"></label>
                                        </b><Br>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>



                </div>

            </div>
        </div>

    </div>










    <div class="content_x" id="page-2">

        <div class="title-content-card-top4" style="height: 30px;"><span class="text-title-Content-card-top" style="display: block; height: 30px; line-height: 25px;">
                <h2>Balance Transfer Calculator</h2>	
            </span></div>
        <script>
            function fv(rate, per, nper, pmt, pv)
            {
                nper = parseFloat(nper);
                pmt = parseFloat(pmt);
                pv = parseFloat(pv);
                rate = eval((rate) / (per * 100));
                if ((pmt == 0) || (nper == 0)) {
                    alert("Why do you want to test me with zeros?");
                    return(0);
                }

                if (rate == 0) // Interest rate is 0

                {
                    fv_value = -(pv + (pmt * nper));
                }
                else
                {
                    x = Math.pow(1 + rate, nper);
                    // y = Math.pow(1 + rate, nper);

                    fv_value = -(-pmt + x * pmt + rate * x * pv) / rate;
                }
                fv_value = conv_number(fv_value, 2);

                return (fv_value);

            }
            function conv_number(expr, decplaces)

            { // This function is from David Goodman's Javascript Bible.

                var str = "" + Math.round(eval(expr) * Math.pow(10, decplaces));

                while (str.length <= decplaces) {
                    str = "0" + str;
                }
                var decpoint = str.length - decplaces;
                return (str.substring(0, decpoint) + "." + str.substring(decpoint, str.length));
            }

            function calcsavings()
            {
                var irate = document.getElementById('i_apr').value;
                var durmonths = document.getElementById('d_apr').value;
                var transferfee = document.getElementById('t_fee').value;
                var totpay = document.getElementById('t_pay').value;

                var transamount = document.getElementById('t_amt').value;
                var currentrate = document.getElementById('c_rte').value;
                totpay = totpay * -1;
                var curramount = transamount * (1 + (transferfee / 100));

                var futurevaluesaved = fv(irate, 12, durmonths, totpay, curramount);

                var futurevaluenontransfer = fv(currentrate, 12, durmonths, totpay, transamount);
                var savings = futurevaluesaved - futurevaluenontransfer;
                document.getElementById('saveamt').innerHTML = "$" + numberWithCommas(round(savings));
                document.getElementById('hidtransresults').style.display = "block";
            }

        </script>
        <div class="content-card-text-infomation">
            <div class="content-apply-text4">            
                <div class="body3">
                    <p>How much will I Save on my Balance Transfer? </p><Br>
                    <div>	
                        %  <input type=text name="i_apr" id="i_apr" value="0"> Introductory APR<br><br>
                        #   <input type=text name="d_apr" id="d_apr" value="0"> /mths. Duration of Intro. APR<br><br>
                        %  <input type=text name=t_fee id="t_fee" value="0"> Balance Transfer Fee<br><br>
                        $   <input type=text name=t_pay id="t_pay" value="0"> Total Monthly Payment<br><Br>
                    </div>

                    <div>
                        <h3>Current Credit Card</h3><Br>
                        $   <input type=text name=t_amt id="t_amt" value="0"> Transfer Amount<br><Br>
                        %  <input type=text name=c_rte id="c_rte" value="0"> Current Rate<Br><bR>		
                    </div>


		    <button class="applybtn" onclick="calcsavings();"><span>Calculate</span> 
                        <img class="img-arrow" src="<?php echo $sitelink ?>/images/arrowbtn.png">
		    </button>
                    <div id="hidtransresults" style="display:none">
                        <br>
                        <br>
                        <p>You can save <label id="saveamt"></label> by transfering to this card.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!/div>        




    <!div class="infocard">
    <div class="content_x" id="page-3">


        <div class="title-content-card-top4" style="height: 30px;"><span class="text-title-Content-card-top" style="display: block; height: 30px; line-height: 25px;">
                <h2>Cash Back Rewards </h2>	
            </span></div>

        <div class="content-card-text-infomation">
            <div class="content-apply-text4">            
                <div class="body3">
                    <script>
                        function runcalcs()
                        {
                            var gas = document.getElementById('gasin').value * 52;
                            var gasper = document.getElementById('Gasperc').value.replace("%", "");
                            var gearn = gas * (gasper / 100);
                            document.getElementById('gasearn').innerHTML = "$" + numberWithCommas(round(gearn));


                            var groceries = document.getElementById('groceriesin').value * 52;
                            var groceriesper = document.getElementById('Groceriesperc').value.replace("%", "");
                            var grocearn = groceries * (groceriesper / 100);
                            document.getElementById('groceriesearn').innerHTML = "$" + numberWithCommas(round(grocearn));

                            var din = document.getElementById('diningin').value * 52;
                            var dinper = document.getElementById('Diningperc').value.replace("%", "");
                            var dinearn = din * (dinper / 100);
                            document.getElementById('diningearn').innerHTML = "$" + numberWithCommas(round(dinearn));

                            var shop = document.getElementById('shoppingin').value * 52;
                            var shopper = document.getElementById('Shoppingperc').value.replace("%", "");
                            var shopearn = shop * (shopper / 100);
                            document.getElementById('shoppingearn').innerHTML = "$" + numberWithCommas(round(shopearn));

                            var travel = document.getElementById('travelin').value;
                            var travelper = document.getElementById('Travelperc').value.replace("%", "");
                            var travelearn = travel * (travelper / 100);
                            document.getElementById('travelearn').innerHTML = "$" + numberWithCommas(round(travelearn));

                            var alloth = document.getElementById('allothersin').value * 52;
                            var allothper = document.getElementById('Allothersperc').value.replace("%", "");
                            var allothearn = alloth * (allothper / 100);
                            document.getElementById('allothersearn').innerHTML = "$" + numberWithCommas(round(allothearn));

                            var earntotal = gearn + grocearn + dinearn + shopearn + travelearn + allothearn;
                            document.getElementById('totsav').innerHTML = "$" + numberWithCommas(round(earntotal));

                        }

                    </script>    

                    <table cellpadding="15px" style="padding: 10px;background-color:#f7f7f7;top:15px;border:1px solid #ebebeb;">
                        <tr>
                            <td>
                                <h3>Expenses</h3>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td style="text-align:right">
                                <h3>Yearly Savings</h3>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Gas
                            </td>
                            <td>
                                $<input type="text" value="50" onchange="runcalcs();" id="gasin"></input> /week
                            </td>
                            <td>
				
				<div class="calculate-select">
				    <img src="<?php echo $sitelink;?>/images/down-arrow.png"/>
                                <select id="Gasperc" onchange="runcalcs();">
                                    <option>0.50%</option>
                                    <option selected="true">1.00%</option>
                                    <option>1.25%</option>
                                    <option>1.50%</option>
                                    <option>2.00%</option>
                                    <option>5.00%</option>
                                </select>
				</div>
                            </td>
                            <td style="text-align:right">
                                <label id="gasearn"></label>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Groceries
                            </td>
                            <td>
                                $<input type="text" value="100" onchange="runcalcs();" id="groceriesin"></input> /week
                            </td>
                            <td>
				<div class="calculate-select">
				    <img src="<?php echo $sitelink;?>/images/down-arrow.png"/>
                                <select id="Groceriesperc" onchange="runcalcs();">
                                    <option>0.50%</option>
                                    <option selected="true">1.00%</option>
                                    <option>1.25%</option>
                                    <option>1.50%</option>
                                    <option>2.00%</option>
                                    <option>5.00%</option>
                                </select>
				</div>
                            </td>
                            <td style="text-align:right">
                                <label id="groceriesearn"></label>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Dining
                            </td>
                            <td>
                                $<input type="text" value="80" onchange="runcalcs();" id="diningin"></input> /week
                            </td>
                            <td>
				<div class="calculate-select">
				    <img src="<?php echo $sitelink;?>/images/down-arrow.png"/>
                                <select id="Diningperc" onchange="runcalcs();">
                                    <option>0.50%</option>
                                    <option selected="true">1.00%</option>
                                    <option>1.25%</option>
                                    <option>1.50%</option>
                                    <option>2.00%</option>
                                    <option>5.00%</option>
                                </select>
				</div>
                            </td>
                            <td style="text-align:right">
                                <label id="diningearn"></label>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Shopping
                            </td>
                            <td>
                                $<input type="text" value="100" id="shoppingin" onchange="runcalcs();"></input> /week
                            </td>
                            <td>
				<div class="calculate-select">
				    <img src="<?php echo $sitelink;?>/images/down-arrow.png"/>
				    <select id="Shoppingperc" onchange="runcalcs();">
					<option>0.50%</option>
					<option selected="true">1.00%</option>
					<option>1.25%</option>
					<option>1.50%</option>
					<option>2.00%</option>
					<option>5.00%</option>
				    </select>
				</div>
                            </td>
                            <td style="text-align:right">
                                <label id="shoppingearn"></label>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Travel
                            </td>
                            <td>
                                $<input type="text" value="4000" onchange="runcalcs();" id="travelin"></input> /year
                            </td>
                            <td>
				<div class="calculate-select">
				<img src="<?php echo $sitelink;?>/images/down-arrow.png"/>
                                <select id="Travelperc" onchange="runcalcs();">
                                    <option>0.50%</option>
                                    <option selected="true">1.00%</option>
                                    <option>1.25%</option>
                                    <option>1.50%</option>
                                    <option>2.00%</option>
                                    <option>5.00%</option>
                                </select>
				</div>
                            </td>
                            <td style="text-align:right">
                                <label id="travelearn"></label>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                All Others
                            </td>
                            <td>
                                $<input type="text" value="400" onchange="runcalcs();" id="allothersin"></input> /week
                            </td>
                            <td>
				<div class="calculate-select">
				<img src="<?php echo $sitelink;?>/images/down-arrow.png"/>
                                <select id="Allothersperc" onchange="runcalcs();">
                                    <option>0.50%</option>
                                    <option selected="true">1.00%</option>
                                    <option>1.25%</option>
                                    <option>1.50%</option>
                                    <option>2.00%</option>
                                    <option>5.00%</option>
                                </select>
				</div>
                            </td>
                            <td style="text-align:right">
                                <label id="allothersearn"></label>
                            </td>
                        </tr>
                    </table>
                    <br>
			<button class="applybtn" onclick="runcalcs();"><span>Calculate</span> 
			    <img class="img-arrow" src="<?php echo $sitelink ?>/images/arrowbtn.png">
			</button>
                    <br>
                    <br>
                    <div> &nbsp;You could be earning <label id="totsav"></label> or more each year with the <a href="<?php echo $sitelink;?>/rewards-credit-cards" >best rewards credit card!</a></div>
                    <br>
                </div>
            </div>
        </div>

    </div>








</div>
<script>
//call after page loaded
    window.onload = runcalcs;
</script>
<script src="<?php echo $sitelink ?>/js/activatables.js" type="text/javascript"></script>
<script type="text/javascript">
    activatables('page', ['page-1', 'page-2', 'page-3']);

    /*
     $("a[href^='\#']").click(function(e){
     alert(1);
     e.preventDefault();
     e.returnValue=false;
     document.location.hash=this.href.substr(this.href.indexOf('#')+1);
     })*/
</script>

