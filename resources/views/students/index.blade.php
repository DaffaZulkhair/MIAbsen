@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Bootstrap Datatables</h4>
                    </div>
                    <div class="header-action">
                        <i data-toggle="collapse" data-target="#datatable-1" aria-expanded="false">
                            <svg width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                            </svg>
                        </i>
                    </div>
                </div>
                <div class="card-body">
                    <div class="collapse" id="datatable-1">
                        <div class="card">
                            <kbd class="bg-dark">
                                <pre id="bootstrap-datatables" class="text-white"><code>
&#x3C;table id=&#x22;datatable&#x22; class=&#x22;table data-table table-striped table-bordered&#x22; &#x3E;
&#x3C;thead&#x3E;
&#x3C;tr&#x3E;
 &#x3C;th&#x3E;Name&#x3C;/th&#x3E;
 &#x3C;th&#x3E;Position&#x3C;/th&#x3E;
 &#x3C;th&#x3E;Office&#x3C;/th&#x3E;
 &#x3C;th&#x3E;Age&#x3C;/th&#x3E;
 &#x3C;th&#x3E;Start date&#x3C;/th&#x3E;
 &#x3C;th&#x3E;Salary&#x3C;/th&#x3E;
&#x3C;/tr&#x3E;
&#x3C;/thead&#x3E;
&#x3C;tbody&#x3E;
&#x3C;tr&#x3E;
 &#x3C;td&#x3E;Tiger Nixon&#x3C;/td&#x3E;
 &#x3C;td&#x3E;System Architect&#x3C;/td&#x3E;
 &#x3C;td&#x3E;Edinburgh&#x3C;/td&#x3E;
 &#x3C;td&#x3E;61&#x3C;/td&#x3E;
 &#x3C;td&#x3E;2011/04/25&#x3C;/td&#x3E;
 &#x3C;td&#x3E;$320,800&#x3C;/td&#x3E;
&#x3C;/tr&#x3E;
&#x3C;tr&#x3E;
 &#x3C;td&#x3E;Garrett Winters&#x3C;/td&#x3E;
 &#x3C;td&#x3E;Accountant&#x3C;/td&#x3E;
 &#x3C;td&#x3E;Tokyo&#x3C;/td&#x3E;
 &#x3C;td&#x3E;63&#x3C;/td&#x3E;
 &#x3C;td&#x3E;2011/07/25&#x3C;/td&#x3E;
 &#x3C;td&#x3E;$170,750&#x3C;/td&#x3E;
&#x3C;/tr&#x3E;
&#x3C;tr&#x3E;
 &#x3C;td&#x3E;Ashton Cox&#x3C;/td&#x3E;
 &#x3C;td&#x3E;Junior Technical Author&#x3C;/td&#x3E;
 &#x3C;td&#x3E;San Francisco&#x3C;/td&#x3E;
 &#x3C;td&#x3E;66&#x3C;/td&#x3E;
 &#x3C;td&#x3E;2009/01/12&#x3C;/td&#x3E;
 &#x3C;td&#x3E;$86,000&#x3C;/td&#x3E;
&#x3C;/tr&#x3E;
&#x3C;tr&#x3E;
 &#x3C;td&#x3E;Cedric Kelly&#x3C;/td&#x3E;
 &#x3C;td&#x3E;Senior Javascript Developer&#x3C;/td&#x3E;
 &#x3C;td&#x3E;Edinburgh&#x3C;/td&#x3E;
 &#x3C;td&#x3E;22&#x3C;/td&#x3E;
 &#x3C;td&#x3E;2012/03/29&#x3C;/td&#x3E;
 &#x3C;td&#x3E;$433,060&#x3C;/td&#x3E;
&#x3C;/tr&#x3E;
&#x3C;tr&#x3E;
 &#x3C;td&#x3E;Airi Satou&#x3C;/td&#x3E;
 &#x3C;td&#x3E;Accountant&#x3C;/td&#x3E;
 &#x3C;td&#x3E;Tokyo&#x3C;/td&#x3E;
 &#x3C;td&#x3E;33&#x3C;/td&#x3E;
 &#x3C;td&#x3E;2008/11/28&#x3C;/td&#x3E;
 &#x3C;td&#x3E;$162,700&#x3C;/td&#x3E;
&#x3C;/tr&#x3E;
&#x3C;tr&#x3E;
 &#x3C;td&#x3E;Brielle Williamson&#x3C;/td&#x3E;
 &#x3C;td&#x3E;Integration Specialist&#x3C;/td&#x3E;
 &#x3C;td&#x3E;New York&#x3C;/td&#x3E;
 &#x3C;td&#x3E;61&#x3C;/td&#x3E;
 &#x3C;td&#x3E;2012/12/02&#x3C;/td&#x3E;
 &#x3C;td&#x3E;$372,000&#x3C;/td&#x3E;
&#x3C;/tr&#x3E;
&#x3C;tr&#x3E;
 &#x3C;td&#x3E;Herrod Chandler&#x3C;/td&#x3E;
 &#x3C;td&#x3E;Sales Assistant&#x3C;/td&#x3E;
 &#x3C;td&#x3E;San Francisco&#x3C;/td&#x3E;
 &#x3C;td&#x3E;59&#x3C;/td&#x3E;
 &#x3C;td&#x3E;2012/08/06&#x3C;/td&#x3E;
 &#x3C;td&#x3E;$137,500&#x3C;/td&#x3E;
&#x3C;/tr&#x3E;
&#x3C;tr&#x3E;
 &#x3C;td&#x3E;Rhona Davidson&#x3C;/td&#x3E;
 &#x3C;td&#x3E;Integration Specialist&#x3C;/td&#x3E;
 &#x3C;td&#x3E;Tokyo&#x3C;/td&#x3E;
 &#x3C;td&#x3E;55&#x3C;/td&#x3E;
 &#x3C;td&#x3E;2010/10/14&#x3C;/td&#x3E;
 &#x3C;td&#x3E;$327,900&#x3C;/td&#x3E;
&#x3C;/tr&#x3E;
&#x3C;tr&#x3E;
 &#x3C;td&#x3E;Colleen Hurst&#x3C;/td&#x3E;
 &#x3C;td&#x3E;Javascript Developer&#x3C;/td&#x3E;
 &#x3C;td&#x3E;San Francisco&#x3C;/td&#x3E;
 &#x3C;td&#x3E;39&#x3C;/td&#x3E;
 &#x3C;td&#x3E;2009/09/15&#x3C;/td&#x3E;
 &#x3C;td&#x3E;$205,500&#x3C;/td&#x3E;
&#x3C;/tr&#x3E;
&#x3C;tr&#x3E;
 &#x3C;td&#x3E;Sonya Frost&#x3C;/td&#x3E;
 &#x3C;td&#x3E;Software Engineer&#x3C;/td&#x3E;
 &#x3C;td&#x3E;Edinburgh&#x3C;/td&#x3E;
 &#x3C;td&#x3E;23&#x3C;/td&#x3E;
 &#x3C;td&#x3E;2008/12/13&#x3C;/td&#x3E;
 &#x3C;td&#x3E;$103,600&#x3C;/td&#x3E;
&#x3C;/tr&#x3E;
&#x3C;tr&#x3E;
 &#x3C;td&#x3E;Jena Gaines&#x3C;/td&#x3E;
 &#x3C;td&#x3E;Office Manager&#x3C;/td&#x3E;
 &#x3C;td&#x3E;London&#x3C;/td&#x3E;
 &#x3C;td&#x3E;30&#x3C;/td&#x3E;
 &#x3C;td&#x3E;2008/12/19&#x3C;/td&#x3E;
 &#x3C;td&#x3E;$90,560&#x3C;/td&#x3E;
&#x3C;/tr&#x3E;
&#x3C;tr&#x3E;
 &#x3C;td&#x3E;Quinn Flynn&#x3C;/td&#x3E;
 &#x3C;td&#x3E;Support Lead&#x3C;/td&#x3E;
 &#x3C;td&#x3E;Edinburgh&#x3C;/td&#x3E;
 &#x3C;td&#x3E;22&#x3C;/td&#x3E;
 &#x3C;td&#x3E;2013/03/03&#x3C;/td&#x3E;
 &#x3C;td&#x3E;$342,000&#x3C;/td&#x3E;
&#x3C;/tr&#x3E;
&#x3C;tr&#x3E;
 &#x3C;td&#x3E;Charde Marshall&#x3C;/td&#x3E;
 &#x3C;td&#x3E;Regional Director&#x3C;/td&#x3E;
 &#x3C;td&#x3E;San Francisco&#x3C;/td&#x3E;
 &#x3C;td&#x3E;36&#x3C;/td&#x3E;
 &#x3C;td&#x3E;2008/10/16&#x3C;/td&#x3E;
 &#x3C;td&#x3E;$470,600&#x3C;/td&#x3E;
&#x3C;/tr&#x3E;
&#x3C;tr&#x3E;
 &#x3C;td&#x3E;Haley Kennedy&#x3C;/td&#x3E;
 &#x3C;td&#x3E;Senior Marketing Designer&#x3C;/td&#x3E;
 &#x3C;td&#x3E;London&#x3C;/td&#x3E;
 &#x3C;td&#x3E;43&#x3C;/td&#x3E;
 &#x3C;td&#x3E;2012/12/18&#x3C;/td&#x3E;
 &#x3C;td&#x3E;$313,500&#x3C;/td&#x3E;
&#x3C;/tr&#x3E;
&#x3C;tr&#x3E;
 &#x3C;td&#x3E;Tatyana Fitzpatrick&#x3C;/td&#x3E;
 &#x3C;td&#x3E;Regional Director&#x3C;/td&#x3E;
 &#x3C;td&#x3E;London&#x3C;/td&#x3E;
 &#x3C;td&#x3E;19&#x3C;/td&#x3E;
 &#x3C;td&#x3E;2010/03/17&#x3C;/td&#x3E;
 &#x3C;td&#x3E;$385,750&#x3C;/td&#x3E;
&#x3C;/tr&#x3E;
&#x3C;tr&#x3E;
 &#x3C;td&#x3E;Michael Silva&#x3C;/td&#x3E;
 &#x3C;td&#x3E;Marketing Designer&#x3C;/td&#x3E;
 &#x3C;td&#x3E;London&#x3C;/td&#x3E;
 &#x3C;td&#x3E;66&#x3C;/td&#x3E;
 &#x3C;td&#x3E;2012/11/27&#x3C;/td&#x3E;
 &#x3C;td&#x3E;$198,500&#x3C;/td&#x3E;
&#x3C;/tr&#x3E;
&#x3C;tr&#x3E;
 &#x3C;td&#x3E;Paul Byrd&#x3C;/td&#x3E;
 &#x3C;td&#x3E;Chief Financial Officer (CFO)&#x3C;/td&#x3E;
 &#x3C;td&#x3E;New York&#x3C;/td&#x3E;
 &#x3C;td&#x3E;64&#x3C;/td&#x3E;
 &#x3C;td&#x3E;2010/06/09&#x3C;/td&#x3E;
 &#x3C;td&#x3E;$725,000&#x3C;/td&#x3E;
&#x3C;/tr&#x3E;
&#x3C;tr&#x3E;
 &#x3C;td&#x3E;Gloria Little&#x3C;/td&#x3E;
 &#x3C;td&#x3E;Systems Administrator&#x3C;/td&#x3E;
 &#x3C;td&#x3E;New York&#x3C;/td&#x3E;
 &#x3C;td&#x3E;59&#x3C;/td&#x3E;
 &#x3C;td&#x3E;2009/04/10&#x3C;/td&#x3E;
 &#x3C;td&#x3E;$237,500&#x3C;/td&#x3E;
&#x3C;/tr&#x3E;
&#x3C;tr&#x3E;
 &#x3C;td&#x3E;Bradley Greer&#x3C;/td&#x3E;
 &#x3C;td&#x3E;Software Engineer&#x3C;/td&#x3E;
 &#x3C;td&#x3E;London&#x3C;/td&#x3E;
 &#x3C;td&#x3E;41&#x3C;/td&#x3E;
 &#x3C;td&#x3E;2012/10/13&#x3C;/td&#x3E;
 &#x3C;td&#x3E;$132,000&#x3C;/td&#x3E;
&#x3C;/tr&#x3E;
&#x3C;tr&#x3E;
 &#x3C;td&#x3E;Dai Rios&#x3C;/td&#x3E;
 &#x3C;td&#x3E;Personnel Lead&#x3C;/td&#x3E;
 &#x3C;td&#x3E;Edinburgh&#x3C;/td&#x3E;
 &#x3C;td&#x3E;35&#x3C;/td&#x3E;
 &#x3C;td&#x3E;2012/09/26&#x3C;/td&#x3E;
 &#x3C;td&#x3E;$217,500&#x3C;/td&#x3E;
&#x3C;/tr&#x3E;
&#x3C;/table&#x3E;
</code></pre>
                            </kbd>
                        </div>
                    </div>
                    <p>
                        Images in Bootstrap are made responsive with
                        <code>.img-fluid</code>. <code>max-width: 100%;</code> and
                        <code>height: auto;</code> are applied to the image so that
                        it scales with the parent element.
                    </p>
                    <div class="table-responsive">
                        <table id="datatable-1" class="table data-table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th class="text-right">Salary</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                    <td class="text-right">$320,800</td>
                                </tr>
                                <tr>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>63</td>
                                    <td>2011/07/25</td>
                                    <td class="text-right">$170,750</td>
                                </tr>
                                <tr>
                                    <td>Ashton Cox</td>
                                    <td>Junior Technical Author</td>
                                    <td>San Francisco</td>
                                    <td>66</td>
                                    <td>2009/01/12</td>
                                    <td class="text-right">$86,000</td>
                                </tr>
                                <tr>
                                    <td>Cedric Kelly</td>
                                    <td>Senior Javascript Developer</td>
                                    <td>Edinburgh</td>
                                    <td>22</td>
                                    <td>2012/03/29</td>
                                    <td class="text-right">$433,060</td>
                                </tr>
                                <tr>
                                    <td>Airi Satou</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>33</td>
                                    <td>2008/11/28</td>
                                    <td class="text-right">$162,700</td>
                                </tr>
                                <tr>
                                    <td>Brielle Williamson</td>
                                    <td>Integration Specialist</td>
                                    <td>New York</td>
                                    <td>61</td>
                                    <td>2012/12/02</td>
                                    <td class="text-right">$372,000</td>
                                </tr>
                                <tr>
                                    <td>Herrod Chandler</td>
                                    <td>Sales Assistant</td>
                                    <td>San Francisco</td>
                                    <td>59</td>
                                    <td>2012/08/06</td>
                                    <td class="text-right">$137,500</td>
                                </tr>
                                <tr>
                                    <td>Rhona Davidson</td>
                                    <td>Integration Specialist</td>
                                    <td>Tokyo</td>
                                    <td>55</td>
                                    <td>2010/10/14</td>
                                    <td class="text-right">$327,900</td>
                                </tr>
                                <tr>
                                    <td>Colleen Hurst</td>
                                    <td>Javascript Developer</td>
                                    <td>San Francisco</td>
                                    <td>39</td>
                                    <td>2009/09/15</td>
                                    <td class="text-right">$205,500</td>
                                </tr>
                                <tr>
                                    <td>Sonya Frost</td>
                                    <td>Software Engineer</td>
                                    <td>Edinburgh</td>
                                    <td>23</td>
                                    <td>2008/12/13</td>
                                    <td class="text-right">$103,600</td>
                                </tr>
                                <tr>
                                    <td>Jena Gaines</td>
                                    <td>Office Manager</td>
                                    <td>London</td>
                                    <td>30</td>
                                    <td>2008/12/19</td>
                                    <td class="text-right">$90,560</td>
                                </tr>
                                <tr>
                                    <td>Quinn Flynn</td>
                                    <td>Support Lead</td>
                                    <td>Edinburgh</td>
                                    <td>22</td>
                                    <td>2013/03/03</td>
                                    <td class="text-right">$342,000</td>
                                </tr>
                                <tr>
                                    <td>Charde Marshall</td>
                                    <td>Regional Director</td>
                                    <td>San Francisco</td>
                                    <td>36</td>
                                    <td>2008/10/16</td>
                                    <td class="text-right">$470,600</td>
                                </tr>
                                <tr>
                                    <td>Haley Kennedy</td>
                                    <td>Senior Marketing Designer</td>
                                    <td>London</td>
                                    <td>43</td>
                                    <td>2012/12/18</td>
                                    <td class="text-right">$313,500</td>
                                </tr>
                                <tr>
                                    <td>Tatyana Fitzpatrick</td>
                                    <td>Regional Director</td>
                                    <td>London</td>
                                    <td>19</td>
                                    <td>2010/03/17</td>
                                    <td class="text-right">$385,750</td>
                                </tr>
                                <tr>
                                    <td>Michael Silva</td>
                                    <td>Marketing Designer</td>
                                    <td>London</td>
                                    <td>66</td>
                                    <td>2012/11/27</td>
                                    <td class="text-right">$198,500</td>
                                </tr>
                                <tr>
                                    <td>Paul Byrd</td>
                                    <td>Chief Financial Officer (CFO)</td>
                                    <td>New York</td>
                                    <td>64</td>
                                    <td>2010/06/09</td>
                                    <td class="text-right">$725,000</td>
                                </tr>
                                <tr>
                                    <td>Gloria Little</td>
                                    <td>Systems Administrator</td>
                                    <td>New York</td>
                                    <td>59</td>
                                    <td>2009/04/10</td>
                                    <td class="text-right">$237,500</td>
                                </tr>
                                <tr>
                                    <td>Bradley Greer</td>
                                    <td>Software Engineer</td>
                                    <td>London</td>
                                    <td>41</td>
                                    <td>2012/10/13</td>
                                    <td class="text-right">$132,000</td>
                                </tr>
                                <tr>
                                    <td>Dai Rios</td>
                                    <td>Personnel Lead</td>
                                    <td>Edinburgh</td>
                                    <td>35</td>
                                    <td>2012/09/26</td>
                                    <td class="text-right">$217,500</td>
                                </tr>
                                <tr>
                                    <td>Jenette Caldwell</td>
                                    <td>Development Lead</td>
                                    <td>New York</td>
                                    <td>30</td>
                                    <td>2011/09/03</td>
                                    <td class="text-right">$345,000</td>
                                </tr>
                                <tr>
                                    <td>Yuri Berry</td>
                                    <td>Chief Marketing Officer (CMO)</td>
                                    <td>New York</td>
                                    <td>40</td>
                                    <td>2009/06/25</td>
                                    <td class="text-right">$675,000</td>
                                </tr>
                                <tr>
                                    <td>Caesar Vance</td>
                                    <td>Pre-Sales Support</td>
                                    <td>New York</td>
                                    <td>21</td>
                                    <td>2011/12/12</td>
                                    <td class="text-right">$106,450</td>
                                </tr>
                                <tr>
                                    <td>Doris Wilder</td>
                                    <td>Sales Assistant</td>
                                    <td>Sydney</td>
                                    <td>23</td>
                                    <td>2010/09/20</td>
                                    <td class="text-right">$85,600</td>
                                </tr>
                                <tr>
                                    <td>Angelica Ramos</td>
                                    <td>Chief Executive Officer (CEO)</td>
                                    <td>London</td>
                                    <td>47</td>
                                    <td>2009/10/09</td>
                                    <td class="text-right">$1,200,000</td>
                                </tr>
                                <tr>
                                    <td>Gavin Joyce</td>
                                    <td>Developer</td>
                                    <td>Edinburgh</td>
                                    <td>42</td>
                                    <td>2010/12/22</td>
                                    <td class="text-right">$92,575</td>
                                </tr>
                                <tr>
                                    <td>Jennifer Chang</td>
                                    <td>Regional Director</td>
                                    <td>Singapore</td>
                                    <td>28</td>
                                    <td>2010/11/14</td>
                                    <td class="text-right">$357,650</td>
                                </tr>
                                <tr>
                                    <td>Brenden Wagner</td>
                                    <td>Software Engineer</td>
                                    <td>San Francisco</td>
                                    <td>28</td>
                                    <td>2011/06/07</td>
                                    <td class="text-right">$206,850</td>
                                </tr>
                                <tr>
                                    <td>Fiona Green</td>
                                    <td>Chief Operating Officer (COO)</td>
                                    <td>San Francisco</td>
                                    <td>48</td>
                                    <td>2010/03/11</td>
                                    <td class="text-right">$850,000</td>
                                </tr>
                                <tr>
                                    <td>Shou Itou</td>
                                    <td>Regional Marketing</td>
                                    <td>Tokyo</td>
                                    <td>20</td>
                                    <td>2011/08/14</td>
                                    <td class="text-right">$163,000</td>
                                </tr>
                                <tr>
                                    <td>Michelle House</td>
                                    <td>Integration Specialist</td>
                                    <td>Sydney</td>
                                    <td>37</td>
                                    <td>2011/06/02</td>
                                    <td class="text-right">$95,400</td>
                                </tr>
                                <tr>
                                    <td>Suki Burks</td>
                                    <td>Developer</td>
                                    <td>London</td>
                                    <td>53</td>
                                    <td>2009/10/22</td>
                                    <td class="text-right">$114,500</td>
                                </tr>
                                <tr>
                                    <td>Prescott Bartlett</td>
                                    <td>Technical Author</td>
                                    <td>London</td>
                                    <td>27</td>
                                    <td>2011/05/07</td>
                                    <td class="text-right">$145,000</td>
                                </tr>
                                <tr>
                                    <td>Gavin Cortez</td>
                                    <td>Team Leader</td>
                                    <td>San Francisco</td>
                                    <td>22</td>
                                    <td>2008/10/26</td>
                                    <td class="text-right">$235,500</td>
                                </tr>
                                <tr>
                                    <td>Martena Mccray</td>
                                    <td>Post-Sales support</td>
                                    <td>Edinburgh</td>
                                    <td>46</td>
                                    <td>2011/03/09</td>
                                    <td class="text-right">$324,050</td>
                                </tr>
                                <tr>
                                    <td>Unity Butler</td>
                                    <td>Marketing Designer</td>
                                    <td>San Francisco</td>
                                    <td>47</td>
                                    <td>2009/12/09</td>
                                    <td class="text-right">$85,675</td>
                                </tr>
                                <tr>
                                    <td>Howard Hatfield</td>
                                    <td>Office Manager</td>
                                    <td>San Francisco</td>
                                    <td>51</td>
                                    <td>2008/12/16</td>
                                    <td class="text-right">$164,500</td>
                                </tr>
                                <tr>
                                    <td>Hope Fuentes</td>
                                    <td>Secretary</td>
                                    <td>San Francisco</td>
                                    <td>41</td>
                                    <td>2010/02/12</td>
                                    <td class="text-right">$109,850</td>
                                </tr>
                                <tr>
                                    <td>Vivian Harrell</td>
                                    <td>Financial Controller</td>
                                    <td>San Francisco</td>
                                    <td>62</td>
                                    <td>2009/02/14</td>
                                    <td class="text-right">$452,500</td>
                                </tr>
                                <tr>
                                    <td>Timothy Mooney</td>
                                    <td>Office Manager</td>
                                    <td>London</td>
                                    <td>37</td>
                                    <td>2008/12/11</td>
                                    <td class="text-right">$136,200</td>
                                </tr>
                                <tr>
                                    <td>Jackson Bradshaw</td>
                                    <td>Director</td>
                                    <td>New York</td>
                                    <td>65</td>
                                    <td>2008/09/26</td>
                                    <td class="text-right">$645,750</td>
                                </tr>
                                <tr>
                                    <td>Olivia Liang</td>
                                    <td>Support Engineer</td>
                                    <td>Singapore</td>
                                    <td>64</td>
                                    <td>2011/02/03</td>
                                    <td class="text-right">$234,500</td>
                                </tr>
                                <tr>
                                    <td>Bruno Nash</td>
                                    <td>Software Engineer</td>
                                    <td>London</td>
                                    <td>38</td>
                                    <td>2011/05/03</td>
                                    <td class="text-right">$163,500</td>
                                </tr>
                                <tr>
                                    <td>Sakura Yamamoto</td>
                                    <td>Support Engineer</td>
                                    <td>Tokyo</td>
                                    <td>37</td>
                                    <td>2009/08/19</td>
                                    <td class="text-right">$139,575</td>
                                </tr>
                                <tr>
                                    <td>Thor Walton</td>
                                    <td>Developer</td>
                                    <td>New York</td>
                                    <td>61</td>
                                    <td>2013/08/11</td>
                                    <td class="text-right">$98,540</td>
                                </tr>
                                <tr>
                                    <td>Finn Camacho</td>
                                    <td>Support Engineer</td>
                                    <td>San Francisco</td>
                                    <td>47</td>
                                    <td>2009/07/07</td>
                                    <td class="text-right">$87,500</td>
                                </tr>
                                <tr>
                                    <td>Serge Baldwin</td>
                                    <td>Data Coordinator</td>
                                    <td>Singapore</td>
                                    <td>64</td>
                                    <td>2012/04/09</td>
                                    <td class="text-right">$138,575</td>
                                </tr>
                                <tr>
                                    <td>Zenaida Frank</td>
                                    <td>Software Engineer</td>
                                    <td>New York</td>
                                    <td>63</td>
                                    <td>2010/01/04</td>
                                    <td class="text-right">$125,250</td>
                                </tr>
                                <tr>
                                    <td>Zorita Serrano</td>
                                    <td>Software Engineer</td>
                                    <td>San Francisco</td>
                                    <td>56</td>
                                    <td>2012/06/01</td>
                                    <td class="text-right">$115,000</td>
                                </tr>
                                <tr>
                                    <td>Jennifer Acosta</td>
                                    <td>Junior Javascript Developer</td>
                                    <td>Edinburgh</td>
                                    <td>43</td>
                                    <td>2013/02/01</td>
                                    <td class="text-right">$75,650</td>
                                </tr>
                                <tr>
                                    <td>Cara Stevens</td>
                                    <td>Sales Assistant</td>
                                    <td>New York</td>
                                    <td>46</td>
                                    <td>2011/12/06</td>
                                    <td class="text-right">$145,600</td>
                                </tr>
                                <tr>
                                    <td>Hermione Butler</td>
                                    <td>Regional Director</td>
                                    <td>London</td>
                                    <td>47</td>
                                    <td>2011/03/21</td>
                                    <td class="text-right">$356,250</td>
                                </tr>
                                <tr>
                                    <td>Lael Greer</td>
                                    <td>Systems Administrator</td>
                                    <td>London</td>
                                    <td>21</td>
                                    <td>2009/02/27</td>
                                    <td class="text-right">$103,500</td>
                                </tr>
                                <tr>
                                    <td>Jonas Alexander</td>
                                    <td>Developer</td>
                                    <td>San Francisco</td>
                                    <td>30</td>
                                    <td>2010/07/14</td>
                                    <td class="text-right">$86,500</td>
                                </tr>
                                <tr>
                                    <td>Shad Decker</td>
                                    <td>Regional Director</td>
                                    <td>Edinburgh</td>
                                    <td>51</td>
                                    <td>2008/11/13</td>
                                    <td class="text-right">$183,000</td>
                                </tr>
                                <tr>
                                    <td>Michael Bruce</td>
                                    <td>Javascript Developer</td>
                                    <td>Singapore</td>
                                    <td>29</td>
                                    <td>2011/06/27</td>
                                    <td class="text-right">$183,000</td>
                                </tr>
                                <tr>
                                    <td>Donna Snider</td>
                                    <td>Customer Support</td>
                                    <td>New York</td>
                                    <td>27</td>
                                    <td>2011/01/25</td>
                                    <td class="text-right">$112,000</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th class="text-right">Salary</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">
                            Bootstrap Datatables With Checkbox
                        </h4>
                    </div>
                    <div class="header-action">
                        <i data-toggle="collapse" data-target="#datatable-2" aria-expanded="false">
                            <svg width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                            </svg>
                        </i>
                    </div>
                </div>
                <div class="card-body">
                    <div class="collapse" id="datatable-2">
                        <div class="card">
                            <kbd class="bg-dark">
                                <pre id="bootstrap-datatables-1" class="text-white"><code>
&#x3C;table id=&#x22;datatable&#x22; class=&#x22;table data-table table-striped table-bordered&#x22; &#x3E;
&#x3C;thead&#x3E;
&#x3C;tr&#x3E;
&#x3C;th&#x3E;Name&#x3C;/th&#x3E;
&#x3C;th&#x3E;Position&#x3C;/th&#x3E;
&#x3C;th&#x3E;Office&#x3C;/th&#x3E;
&#x3C;th&#x3E;Age&#x3C;/th&#x3E;
&#x3C;th&#x3E;Start date&#x3C;/th&#x3E;
&#x3C;th&#x3E;Salary&#x3C;/th&#x3E;
&#x3C;/tr&#x3E;
&#x3C;/thead&#x3E;
&#x3C;tbody&#x3E;
&#x3C;tr&#x3E;
&#x3C;td&#x3E;Tiger Nixon&#x3C;/td&#x3E;
&#x3C;td&#x3E;System Architect&#x3C;/td&#x3E;
&#x3C;td&#x3E;Edinburgh&#x3C;/td&#x3E;
&#x3C;td&#x3E;61&#x3C;/td&#x3E;
&#x3C;td&#x3E;2011/04/25&#x3C;/td&#x3E;
&#x3C;td&#x3E;$320,800&#x3C;/td&#x3E;
&#x3C;/tr&#x3E;
&#x3C;tr&#x3E;
&#x3C;td&#x3E;Garrett Winters&#x3C;/td&#x3E;
&#x3C;td&#x3E;Accountant&#x3C;/td&#x3E;
&#x3C;td&#x3E;Tokyo&#x3C;/td&#x3E;
&#x3C;td&#x3E;63&#x3C;/td&#x3E;
&#x3C;td&#x3E;2011/07/25&#x3C;/td&#x3E;
&#x3C;td&#x3E;$170,750&#x3C;/td&#x3E;
&#x3C;/tr&#x3E;
&#x3C;tr&#x3E;
&#x3C;td&#x3E;Ashton Cox&#x3C;/td&#x3E;
&#x3C;td&#x3E;Junior Technical Author&#x3C;/td&#x3E;
&#x3C;td&#x3E;San Francisco&#x3C;/td&#x3E;
&#x3C;td&#x3E;66&#x3C;/td&#x3E;
&#x3C;td&#x3E;2009/01/12&#x3C;/td&#x3E;
&#x3C;td&#x3E;$86,000&#x3C;/td&#x3E;
&#x3C;/tr&#x3E;
&#x3C;tr&#x3E;
&#x3C;td&#x3E;Cedric Kelly&#x3C;/td&#x3E;
&#x3C;td&#x3E;Senior Javascript Developer&#x3C;/td&#x3E;
&#x3C;td&#x3E;Edinburgh&#x3C;/td&#x3E;
&#x3C;td&#x3E;22&#x3C;/td&#x3E;
&#x3C;td&#x3E;2012/03/29&#x3C;/td&#x3E;
&#x3C;td&#x3E;$433,060&#x3C;/td&#x3E;
&#x3C;/tr&#x3E;
&#x3C;tr&#x3E;
&#x3C;td&#x3E;Airi Satou&#x3C;/td&#x3E;
&#x3C;td&#x3E;Accountant&#x3C;/td&#x3E;
&#x3C;td&#x3E;Tokyo&#x3C;/td&#x3E;
&#x3C;td&#x3E;33&#x3C;/td&#x3E;
&#x3C;td&#x3E;2008/11/28&#x3C;/td&#x3E;
&#x3C;td&#x3E;$162,700&#x3C;/td&#x3E;
&#x3C;/tr&#x3E;
&#x3C;tr&#x3E;
&#x3C;td&#x3E;Brielle Williamson&#x3C;/td&#x3E;
&#x3C;td&#x3E;Integration Specialist&#x3C;/td&#x3E;
&#x3C;td&#x3E;New York&#x3C;/td&#x3E;
&#x3C;td&#x3E;61&#x3C;/td&#x3E;
&#x3C;td&#x3E;2012/12/02&#x3C;/td&#x3E;
&#x3C;td&#x3E;$372,000&#x3C;/td&#x3E;
&#x3C;/tr&#x3E;
&#x3C;tr&#x3E;
&#x3C;td&#x3E;Herrod Chandler&#x3C;/td&#x3E;
&#x3C;td&#x3E;Sales Assistant&#x3C;/td&#x3E;
&#x3C;td&#x3E;San Francisco&#x3C;/td&#x3E;
&#x3C;td&#x3E;59&#x3C;/td&#x3E;
&#x3C;td&#x3E;2012/08/06&#x3C;/td&#x3E;
&#x3C;td&#x3E;$137,500&#x3C;/td&#x3E;
&#x3C;/tr&#x3E;
&#x3C;tr&#x3E;
&#x3C;td&#x3E;Rhona Davidson&#x3C;/td&#x3E;
&#x3C;td&#x3E;Integration Specialist&#x3C;/td&#x3E;
&#x3C;td&#x3E;Tokyo&#x3C;/td&#x3E;
&#x3C;td&#x3E;55&#x3C;/td&#x3E;
&#x3C;td&#x3E;2010/10/14&#x3C;/td&#x3E;
&#x3C;td&#x3E;$327,900&#x3C;/td&#x3E;
&#x3C;/tr&#x3E;
&#x3C;tr&#x3E;
&#x3C;td&#x3E;Colleen Hurst&#x3C;/td&#x3E;
&#x3C;td&#x3E;Javascript Developer&#x3C;/td&#x3E;
&#x3C;td&#x3E;San Francisco&#x3C;/td&#x3E;
&#x3C;td&#x3E;39&#x3C;/td&#x3E;
&#x3C;td&#x3E;2009/09/15&#x3C;/td&#x3E;
&#x3C;td&#x3E;$205,500&#x3C;/td&#x3E;
&#x3C;/tr&#x3E;
&#x3C;tr&#x3E;
&#x3C;td&#x3E;Sonya Frost&#x3C;/td&#x3E;
&#x3C;td&#x3E;Software Engineer&#x3C;/td&#x3E;
&#x3C;td&#x3E;Edinburgh&#x3C;/td&#x3E;
&#x3C;td&#x3E;23&#x3C;/td&#x3E;
&#x3C;td&#x3E;2008/12/13&#x3C;/td&#x3E;
&#x3C;td&#x3E;$103,600&#x3C;/td&#x3E;
&#x3C;/tr&#x3E;
&#x3C;tr&#x3E;
&#x3C;td&#x3E;Jena Gaines&#x3C;/td&#x3E;
&#x3C;td&#x3E;Office Manager&#x3C;/td&#x3E;
&#x3C;td&#x3E;London&#x3C;/td&#x3E;
&#x3C;td&#x3E;30&#x3C;/td&#x3E;
&#x3C;td&#x3E;2008/12/19&#x3C;/td&#x3E;
&#x3C;td&#x3E;$90,560&#x3C;/td&#x3E;
&#x3C;/tr&#x3E;
&#x3C;tr&#x3E;
&#x3C;td&#x3E;Quinn Flynn&#x3C;/td&#x3E;
&#x3C;td&#x3E;Support Lead&#x3C;/td&#x3E;
&#x3C;td&#x3E;Edinburgh&#x3C;/td&#x3E;
&#x3C;td&#x3E;22&#x3C;/td&#x3E;
&#x3C;td&#x3E;2013/03/03&#x3C;/td&#x3E;
&#x3C;td&#x3E;$342,000&#x3C;/td&#x3E;
&#x3C;/tr&#x3E;
&#x3C;tr&#x3E;
&#x3C;td&#x3E;Charde Marshall&#x3C;/td&#x3E;
&#x3C;td&#x3E;Regional Director&#x3C;/td&#x3E;
&#x3C;td&#x3E;San Francisco&#x3C;/td&#x3E;
&#x3C;td&#x3E;36&#x3C;/td&#x3E;
&#x3C;td&#x3E;2008/10/16&#x3C;/td&#x3E;
&#x3C;td&#x3E;$470,600&#x3C;/td&#x3E;
&#x3C;/tr&#x3E;
&#x3C;tr&#x3E;
&#x3C;td&#x3E;Haley Kennedy&#x3C;/td&#x3E;
&#x3C;td&#x3E;Senior Marketing Designer&#x3C;/td&#x3E;
&#x3C;td&#x3E;London&#x3C;/td&#x3E;
&#x3C;td&#x3E;43&#x3C;/td&#x3E;
&#x3C;td&#x3E;2012/12/18&#x3C;/td&#x3E;
&#x3C;td&#x3E;$313,500&#x3C;/td&#x3E;
&#x3C;/tr&#x3E;
&#x3C;tr&#x3E;
&#x3C;td&#x3E;Tatyana Fitzpatrick&#x3C;/td&#x3E;
&#x3C;td&#x3E;Regional Director&#x3C;/td&#x3E;
&#x3C;td&#x3E;London&#x3C;/td&#x3E;
&#x3C;td&#x3E;19&#x3C;/td&#x3E;
&#x3C;td&#x3E;2010/03/17&#x3C;/td&#x3E;
&#x3C;td&#x3E;$385,750&#x3C;/td&#x3E;
&#x3C;/tr&#x3E;
&#x3C;tr&#x3E;
&#x3C;td&#x3E;Michael Silva&#x3C;/td&#x3E;
&#x3C;td&#x3E;Marketing Designer&#x3C;/td&#x3E;
&#x3C;td&#x3E;London&#x3C;/td&#x3E;
&#x3C;td&#x3E;66&#x3C;/td&#x3E;
&#x3C;td&#x3E;2012/11/27&#x3C;/td&#x3E;
&#x3C;td&#x3E;$198,500&#x3C;/td&#x3E;
&#x3C;/tr&#x3E;
&#x3C;tr&#x3E;
&#x3C;td&#x3E;Paul Byrd&#x3C;/td&#x3E;
&#x3C;td&#x3E;Chief Financial Officer (CFO)&#x3C;/td&#x3E;
&#x3C;td&#x3E;New York&#x3C;/td&#x3E;
&#x3C;td&#x3E;64&#x3C;/td&#x3E;
&#x3C;td&#x3E;2010/06/09&#x3C;/td&#x3E;
&#x3C;td&#x3E;$725,000&#x3C;/td&#x3E;
&#x3C;/tr&#x3E;
&#x3C;tr&#x3E;
&#x3C;td&#x3E;Gloria Little&#x3C;/td&#x3E;
&#x3C;td&#x3E;Systems Administrator&#x3C;/td&#x3E;
&#x3C;td&#x3E;New York&#x3C;/td&#x3E;
&#x3C;td&#x3E;59&#x3C;/td&#x3E;
&#x3C;td&#x3E;2009/04/10&#x3C;/td&#x3E;
&#x3C;td&#x3E;$237,500&#x3C;/td&#x3E;
&#x3C;/tr&#x3E;
&#x3C;tr&#x3E;
&#x3C;td&#x3E;Bradley Greer&#x3C;/td&#x3E;
&#x3C;td&#x3E;Software Engineer&#x3C;/td&#x3E;
&#x3C;td&#x3E;London&#x3C;/td&#x3E;
&#x3C;td&#x3E;41&#x3C;/td&#x3E;
&#x3C;td&#x3E;2012/10/13&#x3C;/td&#x3E;
&#x3C;td&#x3E;$132,000&#x3C;/td&#x3E;
&#x3C;/tr&#x3E;
&#x3C;tr&#x3E;
&#x3C;td&#x3E;Dai Rios&#x3C;/td&#x3E;
&#x3C;td&#x3E;Personnel Lead&#x3C;/td&#x3E;
&#x3C;td&#x3E;Edinburgh&#x3C;/td&#x3E;
&#x3C;td&#x3E;35&#x3C;/td&#x3E;
&#x3C;td&#x3E;2012/09/26&#x3C;/td&#x3E;
&#x3C;td&#x3E;$217,500&#x3C;/td&#x3E;
&#x3C;/tr&#x3E;
&#x3C;/table&#x3E;
                   </code></pre>
                            </kbd>
                        </div>
                    </div>
                    <p>
                        Images in Bootstrap are made responsive with
                        <code>.img-fluid</code>. <code>max-width: 100%;</code> and
                        <code>height: auto;</code> are applied to the image so that
                        it scales with the parent element.
                    </p>
                    <div class="table-responsive">
                        <table id="datatable" class="table data-table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="pr-0">
                                        <div class="d-flex justify-content-start align-items-end mb-1">
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" class="custom-control-input m-0"
                                                    id="customCheck1" />
                                                <label class="custom-control-label" for="customCheck1"></label>
                                            </div>
                                        </div>
                                    </th>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th class="text-right">Salary</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="pr-0">
                                        <div class="d-flex justify-content-start align-items-end mb-1">
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" class="custom-control-input m-0"
                                                    id="customCheck" />
                                                <label class="custom-control-label" for="customCheck"></label>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                    <td class="text-right">$320,800</td>
                                </tr>
                                <tr>
                                    <td class="pr-0">
                                        <div class="d-flex justify-content-start align-items-end mb-1">
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" class="custom-control-input m-0"
                                                    id="customCheck2" />
                                                <label class="custom-control-label" for="customCheck2"></label>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>63</td>
                                    <td>2011/07/25</td>
                                    <td class="text-right">$170,750</td>
                                </tr>
                                <tr>
                                    <td class="pr-0">
                                        <div class="d-flex justify-content-start align-items-end mb-1">
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" class="custom-control-input m-0"
                                                    id="customCheck3" />
                                                <label class="custom-control-label" for="customCheck3"></label>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Herrod Chandler</td>
                                    <td>Sales Assistant</td>
                                    <td>San Francisco</td>
                                    <td>59</td>
                                    <td>2012/08/06</td>
                                    <td class="text-right">$137,500</td>
                                </tr>
                                <tr>
                                    <td class="pr-0">
                                        <div class="d-flex justify-content-start align-items-end mb-1">
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" class="custom-control-input m-0"
                                                    id="customCheck4" />
                                                <label class="custom-control-label" for="customCheck4"></label>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Rhona Davidson</td>
                                    <td>Integration Specialist</td>
                                    <td>Tokyo</td>
                                    <td>55</td>
                                    <td>2010/10/14</td>
                                    <td class="text-right">$327,900</td>
                                </tr>
                                <tr>
                                    <td class="pr-0">
                                        <div class="d-flex justify-content-start align-items-end mb-1">
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" class="custom-control-input m-0"
                                                    id="customCheck5" />
                                                <label class="custom-control-label" for="customCheck5"></label>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Colleen Hurst</td>
                                    <td>Javascript Developer</td>
                                    <td>San Francisco</td>
                                    <td>39</td>
                                    <td>2009/09/15</td>
                                    <td class="text-right">$205,500</td>
                                </tr>
                                <tr>
                                    <td class="pr-0">
                                        <div class="d-flex justify-content-start align-items-end mb-1">
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" class="custom-control-input m-0"
                                                    id="customCheck6" />
                                                <label class="custom-control-label" for="customCheck6"></label>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Sonya Frost</td>
                                    <td>Software Engineer</td>
                                    <td>Edinburgh</td>
                                    <td>23</td>
                                    <td>2008/12/13</td>
                                    <td class="text-right">$103,600</td>
                                </tr>
                                <tr>
                                    <td class="pr-0">
                                        <div class="d-flex justify-content-start align-items-end mb-1">
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" class="custom-control-input m-0"
                                                    id="customCheck11" />
                                                <label class="custom-control-label" for="customCheck11"></label>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Jena Gaines</td>
                                    <td>Office Manager</td>
                                    <td>London</td>
                                    <td>30</td>
                                    <td>2008/12/19</td>
                                    <td class="text-right">$90,560</td>
                                </tr>
                                <tr>
                                    <td class="pr-0">
                                        <div class="d-flex justify-content-start align-items-end mb-1">
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" class="custom-control-input m-0"
                                                    id="customCheck7" />
                                                <label class="custom-control-label" for="customCheck7"></label>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Quinn Flynn</td>
                                    <td>Support Lead</td>
                                    <td>Edinburgh</td>
                                    <td>22</td>
                                    <td>2013/03/03</td>
                                    <td class="text-right">$342,000</td>
                                </tr>
                                <tr>
                                    <td class="pr-0">
                                        <div class="d-flex justify-content-start align-items-end mb-1">
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" class="custom-control-input m-0"
                                                    id="customCheck8" />
                                                <label class="custom-control-label" for="customCheck8"></label>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Charde Marshall</td>
                                    <td>Regional Director</td>
                                    <td>San Francisco</td>
                                    <td>36</td>
                                    <td>2008/10/16</td>
                                    <td class="text-right">$470,600</td>
                                </tr>
                                <tr>
                                    <td class="pr-0">
                                        <div class="d-flex justify-content-start align-items-end mb-1">
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" class="custom-control-input m-0"
                                                    id="customCheck9" />
                                                <label class="custom-control-label" for="customCheck9"></label>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Haley Kennedy</td>
                                    <td>Senior Marketing Designer</td>
                                    <td>London</td>
                                    <td>43</td>
                                    <td>2012/12/18</td>
                                    <td class="text-right">$313,500</td>
                                </tr>
                                <tr>
                                    <td class="pr-0">
                                        <div class="d-flex justify-content-start align-items-end mb-1">
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" class="custom-control-input m-0"
                                                    id="customCheck10" />
                                                <label class="custom-control-label" for="customCheck10"></label>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Tatyana Fitzpatrick</td>
                                    <td>Regional Director</td>
                                    <td>London</td>
                                    <td>19</td>
                                    <td>2010/03/17</td>
                                    <td class="text-right">$385,750</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td class="pr-0">
                                        <div class="d-flex justify-content-start align-items-end mb-1">
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" class="custom-control-input m-0"
                                                    id="customCheck100" />
                                                <label class="custom-control-label" for="customCheck100"></label>
                                            </div>
                                        </div>
                                    </td>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th class="text-right">Salary</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
