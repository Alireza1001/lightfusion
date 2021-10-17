<aside id="lf_landing_right">
    <?php if(is_home()) { ?>
        <section class="lf_blog_item_filter" id="lf_weblog_filter_1">
            <p>Course: </p>
            <select id="lf_weblog_country_filter" name="lf_weblog_country_filter" >
                <option value=''>all</options>
                <option value='General'>General</options>
                <option value='ATPL'>ATPL</options>
            </select>
            <p>Subject: </p>
            <select id="lf_weblog_type_filter" name="lf_weblog_type_filter" >
                <option value=''>all</options>
                <option value='PrinciplesofFlight'>Principles of Flight</options>
                <option value='Meteorology'>Meteorology</options>
                <option value='FlightInstruments'>Flight Instruments</options>
                <option value='Meteorology'>Meteorology</options>
                <option value='Communication'>Communication</options>
                <option value='HumanPerformance'>Human Performance</options>
                <option value='GeneralNavigation'>General Navigation</options>
                <option value='Mass&Balance-Performance'>Mass & Balance - Performance</options>
                <option value='RadioNavigation'>Radio Navigation</options>
                <option value='Electrics&Electronics'>Electrics & Electronics</options>
                <option value='Powerplant'>Powerplant</options>
                <option value='FlightComputer-CR3'>Flight Computer - CR3</options>
                <option value='AirframesandSystems'>Airframes and Systems</options>
            </select>
        </section>
    <?php }else if(is_page_template( 'page-category2.php' )) { ?>
        <section class="lf_blog_item_filter" id="lf_weblog_filter_1">
            <p>Type: </p>
            <select id="lf_weblog_country_filter" name="lf_weblog_country_filter" >
                <option value=''>all</options>
                <option value='distance'>Distance</options>
                <option value='time Aloft'>Time Aloft</options>
                <option value='acrobatic'>Acrobatic</options>
                <option value='decorative'>Decorative</options>
            </select>
            <p>Difficulity: </p>
            <select id="lf_weblog_type_filter" name="lf_weblog_type_filter" >
                <option value=''>all</options>
                <option value='easy'>Easy</options>
                <option value='medium'>Medium</options>
                <option value='hard'>Hard</options>
                <option value='advanced'>Advanced</options>
            </select>
            <!-- <p>Scissors: </p>
            <select id="lf_weblog_type_filter" name="lf_weblog_type_filter" >
                <option value=''>Don’t care</options>
                <option value='yes-scissors'>Yes Scissors</options>
                <option value='no-scissors'>No Scissors</options>
            </select> -->
        </section>
    <?php } ?>
</aside>