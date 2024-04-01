const bankname = document.querySelector('#firm_name')
const writeup = document.querySelector('#writeup')
const interviewsum = document.querySelector('#interviewsum')
const emailformat = document.querySelector('#emailex')
const banklogo = document.querySelector(".firm_logo")
const writtencont = document.querySelector(".writtencont")
const notescont = document.querySelector(".notescont")
const contactcont = document.querySelector(".contactcont")
const appcont = document.querySelector(".app_cont")
const button_modal_cont = document.querySelector(".button_modal_cont")
const load_dashboard_section = document.querySelector(".load_dashboard_section")
const all_switches = document.querySelectorAll(".switch")

const info_cont = document.querySelector(".info_inner_container")

const show_all_classes = document.querySelector(".show_all")
const show_yours_classes = document.querySelector(".show_yours")
const show_info_classes = document.querySelector(".show_info")

const tabcont = document.querySelector(".tab-cont")
const apptiles = document.querySelector(".app_tile_holder")
const scrollinner = document.querySelector(".scroll-inner-firm-cont")

class NewBank {
    constructor(bankname,bankid){
        this.bankname = bankname;
        this.bankid = bankid;
        this.switchtothis = function(){
            this.button = document.querySelector("#"+this.bankid);
            this.button.onclick = () =>{
                bankname.innerHTML = this.bankname;
                writeup.innerHTML = "";
                interviewsum.innerHTML = "";
            }
        }
    }
}

var firmidlistarray = ['allenco','bankofamerica','barclays','bmo','centerview','citigroup','cowen','creditsuisse','evercore','financo','goldmansachs','greenhill','guggenheim','houlihanlokey','jefferies','jpmorgan','lazard','macquarie','mizuho','mkleinco','moelis','morganstanley','perellaweinberg','pjt','raine','rbc','rothschildco','solomonpartners','ubs','williamblair']

// Manipulate this below!!!
// Create an OG PAGE with elements explaining how to use this page!
$(document)
.on('click', ".switch", function(event) {
    scroll(0,0)
    var thisid = $(this).attr("id");
    var thistitle = $(this).attr("value");
    if(!firmidlistarray.includes(thisid)){
        bankname.innerHTML = thistitle;
        tabcont.style.opacity="1"
        tabcont.style.top ="0"
        writtencont.style.display = "none";
        appcont.style.display = "block";
        button_modal_cont.style.display = "flex";
        apptiles.style.display = "flex";
        banklogo.style.display = "none";
        notescont.style.display = "block";
        contactcont.style.display = "block";
        load_dashboard_section.style.display = "none";
        scrollinner.scrollTop = 0;
        info_cont.classList.toggle("slideup_info_cont");
        setTimeout(function() {
            info_cont.classList.toggle("slideup_info_cont");
        }, 1200);
    } else if(firmidlistarray.includes(thisid) & (show_all_classes.classList.contains("current_show_filter"))) {
        tabcont.style.opacity="1"
        tabcont.style.top ="0"
        writtencont.style.display = "block";
        banklogo.style.display = "block";
        notescont.style.display = "block";
        contactcont.style.display = "block";
        appcont.style.display = "block";
        button_modal_cont.style.display = "flex";
        apptiles.style.display = "flex";
        load_dashboard_section.style.display = "none";
        scrollinner.scrollTop = 0;
        // info_cont.classList.toggle("slideup_info_cont");
        info_cont.classList.toggle("slideup_info_cont");
        setTimeout(function() {
            info_cont.classList.toggle("slideup_info_cont");
        }, 1200);
    } else if(firmidlistarray.includes(thisid) & (show_yours_classes.classList.contains("current_show_filter"))){
        tabcont.style.opacity="1"
        tabcont.style.top ="0"
        writtencont.style.display = "none";
        banklogo.style.display = "block";
        notescont.style.display = "block";
        contactcont.style.display = "block";
        appcont.style.display = "block";
        button_modal_cont.style.display = "flex";
        apptiles.style.display = "flex";
        load_dashboard_section.style.display = "none";
        scrollinner.scrollTop = 0;
        // info_cont.classList.toggle("slideup_info_cont");
        info_cont.classList.toggle("slideup_info_cont");
        setTimeout(function() {
            info_cont.classList.toggle("slideup_info_cont");
        }, 1200);
    } else if(firmidlistarray.includes(thisid) & (show_info_classes.classList.contains("current_show_filter"))){
        tabcont.style.opacity="1"
        tabcont.style.top ="0"
        writtencont.style.display = "block";
        banklogo.style.display = "block";
        notescont.style.display = "none";
        contactcont.style.display = "none";
        appcont.style.display = "block";
        button_modal_cont.style.display = "none";
        apptiles.style.display = "none";
        load_dashboard_section.style.display = "none";
        scrollinner.scrollTop = 0;
        // info_cont.classList.toggle("slideup_info_cont");
        info_cont.classList.toggle("slideup_info_cont");
        setTimeout(function() {
            info_cont.classList.toggle("slideup_info_cont");
        }, 1200);
    }
    all_switches.forEach(function(dat){
        var firm_title_for_comp = bankname.innerHTML;
        var firm_title_for_comp = firm_title_for_comp.replaceAll("&amp;","&");
        if(dat.getAttribute("value") == firm_title_for_comp){
            if(dat.classList.contains("current_switch")){
            }else{
                dat.classList.add("current_switch")
            }
        }else{
            if(dat.classList.contains("current_switch")){
                dat.classList.remove("current_switch")
            }else{
            }
        }
        
    });
})


// LOGOS
const rothschild_button = document.querySelectorAll('#rothschildco')
rothschild_button.forEach(element => {
    element.onclick = () =>{
    bankname.innerHTML = "Rothschild & Co"
    writeup.innerHTML = "Rothschild, founded in the early 1800s, is one of Europe’s oldest and most prominent banks. In the US, Rothschild operates as a middle-market firm, with a particularly strong restructuring division. Besides their global advisory services, the bank also has solid wealth management, asset management, and merchant banking arms. The firm takes pride in caring about their employees and the long term health of the company, rather than managing their operations on a quarter to quarter basis. Rothschild's values, combined with the firm’s deep European roots, creates a respectable culture that is admired across Wall Street."
    interviewsum.innerHTML = "Networking at Rothschild is generally important for securing an interview, and they typically take a few Michigan students each year for their intern class. The first round interview is typically all technical, testing the candidate's understanding and ability to speak concisely about technical content and how it pertains to business concepts. The first round is followed by a 2 or 3 interview super day which is much more behavioral. This allows the upper level bankers to get more of a feel for the candidate."
    emailformat.innerHTML = "first.last@rothschildandco.com (ie. john.smith@rothschildandco.com)"
    banklogo.src = ""
    }
})

const moelis_button = document.querySelectorAll('#moelis')
moelis_button.forEach(element => {
    element.onclick = () =>{
    bankname.innerHTML = "Moelis"
    writeup.innerHTML = "Moelis is a very prestigious boutique firm. The bank is known for their services in M&A advisory and restructuring across many different sectors. They mainly focus on the middle market, and the firm has extremely high deal flow. Moelis is known for their hard working analysts to stay on top of the deal flow. When Moelis comes to Michigan, it is evident that their blue roots run deep. Michigan is one of their most represented schools in each analyst class, and they prioritize their time recruiting students in Ann Arbor. Analysts work extremely closely with their VPs and MDs, which is a huge part of Moelis’s top-notch education. This leads to many Moelis analysts landing jobs at top PE firms after two years on the job. While the Moelis summer internship is still a generalist experience, their analysts now go through group placement during full-time training."
    interviewsum.innerHTML = "Networking is extremely important for securing an interview at Moelis. The firm comes to Ann Arbor in the fall and the spring, and it is important to sign up for coffee chats or initiate networking calls before the spring visit. They host an invite-only networking event after their Ross presentation, so it’s important to network well to secure an invite. The first round interview for Moelis is definitely more technical than the typical firm. It tests more overarching ideas, concepts, and business skills pertaining to investment banking. If a candidate passes the first round, the super day consists of 2 interviews with MDs: one being technical and the other being behavioral."
    emailformat.innerHTML = "first.last@moelis.com (ie. john.smith@moelis.com)"
    banklogo.src = "images/banklogos/moelis.png"
    }
})

//NEED INFO//
const allen_button = document.querySelectorAll('#allenco')
allen_button.forEach(element => {
    element.onclick = () =>{
    bankname.innerHTML = "Allen & Co"
    writeup.innerHTML = "Allen & Co is a top boutique investment bank. Upon creation, the firm employed 175 bankers, and has stayed that small ever since. The bank is strictly relationships based, meaning all of their work and deals are focused on long term relationships. On the product side, they are a full service bank, which is rare for a bank so small. Their main industry focus is in TMT, however all analysts are generalists because of how small the firm is. By the same token, all deal teams are very lean, most of the time being 4 bankers per deal, one of each position. The firm is known as a fun place to work, as the tight-knit nature of the bank creates a strong work environment."
    interviewsum.innerHTML = "The internship program at Allen & Co is relatively unique. Their intern classes tend to be around 15 students, making this bank extremely difficult to receive an offer at. Additionally, they don’t have a main target school as they typically have interns from all over the country in each class. It’s important to network well at this firm, and a personal connection definitely helps a candidate get their foot in the door. For most years, their application is due earlier than other banks, so be on the lookout for Allen & Co deadlines. Traditionally, the process consists of 3 interviews, with technical questions noted to be above average in difficulty."
    emailformat.innerHTML = "flast@allenco.com (ie. jsmith@allenco.com)"
    banklogo.src = "images/banklogos/allenco.png"
    }
})

const bofa_button = document.querySelectorAll('#bankofamerica')
bofa_button.forEach(element => {
    element.onclick = () =>{
    bankname.innerHTML = "Bank of America"
    writeup.innerHTML = "Bank of America is a bulge bracket bank, well known for their global advisory services across the United States. After acquiring Merrill Lynch in 2009, Bank of America leveraged their invaluable connections to become a leader in the investment banking industry. B of A is known for their strengths in TMT, healthcare, and financial sponsors. With that said, B of A still spans across nearly all industry sectors. Incoming interns go through a placement process before their internship begins to determine their groups."
    interviewsum.innerHTML = "Bank of America places a strong emphasis on networking during the early stages of their recruiting process to identify potential candidates. Last year, select bankers from the TMT group came to campus for an informal networking session in January. Bank of America hosted a firm-wide event on campus in March, which included coffee chats and an invite-only dinner. Upon the submission of a formal application, candidates proceed to the first round interview via HireVue, which is subsequently followed by a super day. The super day includes two interviews, one behavioral and one technical. The technicals are known to be straightforward, with many sourced directly from the guides."
    emailformat.innerHTML = "first.last@bofa.com (ie. john.smith@bofa.com)"
    banklogo.src = "images/banklogos/bankofamerica.png"
    }
})

const barclays_button = document.querySelectorAll('#barclays')
barclays_button.forEach(element => {
    element.onclick = () =>{
    bankname.innerHTML = "Barclays"
    writeup.innerHTML = "Barclays is a full service, bulge bracket investment bank. Unlike the rest of the bulge brackets on the street, Barclays is headquartered in the UK. This is representative of their global firm as they are making an impact on companies across the globe. One of Barclays’s strengths is known to be their power and utilities group. Besides that vertical, Barclays is a super well rounded firm, with solid groups across the board. Additionally, Barclays is known to have a more laid back company culture in comparison to other firms. They give generalist offers, and then incoming interns must network into a specific group for the internship."
    interviewsum.innerHTML = "Barclays’s recruiting process starts with a standard application. Then, typically in April, they select candidates to complete a first round via HireVue. Next, they typically have a second round screening phone call where they ask basic behavioral questions to get to know the candidate. Finally, the super day is three 30 minute interviews, with one straightforward technical interview and two behavioral interviews. The whole process is known to be a bit more drawn out than the typical firm’s timeline."
    emailformat.innerHTML = "first.last@barclays.com (ie. john.smith@barclays.com)"
    banklogo.src = "images/banklogos/barclays.png"
    }
})

const bmo_button = document.querySelectorAll('#bmo')
bmo_button.forEach(element => {
    element.onclick = () =>{
    bankname.innerHTML = "BMO"
    writeup.innerHTML = "BMO, short for the Bank of Montreal, has a middle market investment banking presence in the US. The firm is one of the oldest banks in Canada, founded in 1817, and is headquartered in Montreal. They have since expanded into the US, with offices in NYC, Chicago, and San Francisco. The firm is known to uphold Canadian values, and is thought of as more relaxed than the typical firm. BMO has many different industry groups, but they’re most known for their global metals & mining group. Interns are placed into industry groups for the internship and for their full time jobs. The firm is also known to prioritize sustainability initiatives, and the growth of their interns."
    interviewsum.innerHTML = "Networking at BMO carries less weight compared to other banks. Making one or two connections will likely result in an interview. Last year, BMO came to Ann Arbor for both first and second round interviews. The first round is typically behavioral with a number of questions on current events. The second round is conducted the next day, with the same content format. BMO typically gives offers the following day, with only five days to accept or decline."
    emailformat.innerHTML = "first.last@bmo.com (ie. john.smith@bmo.com)"
    banklogo.src = "images/banklogos/bmo.png"
    }
})

const centerview_button = document.querySelectorAll('#centerview')
centerview_button.forEach(element => {
    element.onclick = () =>{
    bankname.innerHTML = "Centerview"
    writeup.innerHTML = "Centerview is known as one of the top boutiques on the street. With a huge emphasis on banker development and retention, the analyst program at Centerview lasts for 3 years, and approximately 50% of each analyst class stays until they are associates. The firm has the traditional boutique model of strong M&A advisory and restructuring services. Although the firm is generalist, they are known for specializing in consumer retail and health care. This firm produces career bakers, and they care deeply about the development of their analysts. Partners are involved in the analyst experience, and the firm gives analysts great benefits, as they are known for being the highest paying bank on the street."
    interviewsum.innerHTML = "Centerview has a pretty atypical recruiting process. As of 2023, Centerview kicks off the process with a campus visit in the spring for most of their target schools, followed by an application drop (sometimes through email) which is open for a short period of time. Some years, the firm doesn’t even open a formal application, and they select candidates solely through networking. Regardless of the application format, networking is extremely important at Centerview. Getting an interview is heavily dependent on networking, as very few first round interviews are given. In regards to interviews, the first round consists of behaviorals, technicals, and sometimes brainteasers. The super day typically consists of five interviews and a networking event/dinner for some of their candidates. Bankers of varied ages give the super day interviews (sometimes even C-Suite executives) and the format is typically one resume-based, one fit/behavioral, one technical, one situational behavioral, and one creative problem-solving interview. They look for out-of-the-box thinkers and unique applicants who have clear reasons for wanting to do IB, specifically at Centerview."
    emailformat.innerHTML = "firstinitiallastname@centerview.com (ie. jsmith@centerview.com)"
    banklogo.src = "images/banklogos/centerview.png"
    }
})

const citibank_button = document.querySelectorAll('#citigroup')
citibank_button.forEach(element => {
    element.onclick = () =>{
    bankname.innerHTML = "Citigroup"
    writeup.innerHTML = "Citigroup is a strong bulge-bracket firm. They offer many different products to a wide range of clients, working on some of the biggest deals each year. The bank has a top international presence, and they participate in a handful of cross-border M&A deals. Citi is also known for their particularly strong industrials group. However, on the product side, the M&A group is known for being a top-notch team because it is the execution center of the aforementioned big deals. Additionally, the interns undergo a matching process prior to their internship to find the team they’ll work with for the summer and potentially full-time as well."
    interviewsum.innerHTML = "Citi recruits earlier than most bulges, with interviews typically starting in March. Because of this, it’s important to start networking early. Between the Citi Case Competition and the main campus visit, the firm offers a good amount of on campus networking opportunities for Michigan students. It’s definitely important to get on the phone with at least two bankers, and fortunately the recruiting team tends to be pretty responsive. After the networking phase, expect a first round interview, followed by a super day of 3 interviews. The first round tends to be heavily resume based, as they dig into past financial experiences, if applicable. The super day typically consists of a fairly basic technical section and two more behavioral interviews. One of the behavioral interviews is typically more resume geared, while the other features some more standard behavioral questions. The super day is usually conducted by mid to senior level bankers."
    emailformat.innerHTML = "first.last@citi.com (ie. john.smith@citi.com)"
    banklogo.src = "images/banklogos/citigroup.png"
    }
})


// const creditsuisse_button = document.querySelector('#creditsuisse')
// creditsuisse_button.onclick = () =>{
//     bankname.innerHTML = "Credit Suisse"
//     writeup.innerHTML = "Credit Suisse is a well known, full service, bulge-bracket investment bank. Recently, the company has been in the news as they suffered billions of dollars in losses over the past couple years. However, the firm has been working hard with many internal changes to fight back and turn the corner. Though the firm has had its struggles, CS remains a best-in-class name for helping advance young finance careers into areas such as PE and VC. The firm has lean deal teams across the board, which is rare out of a bulge-bracket. Plus, the culture is known as extremely collegiate, representing a strong company environment."
//     interviewsum.innerHTML = "CS recruits through 2 programs. First is their traditional IB program, and the second is directly into their Financial Institutions Group (FIG). These 2 programs have two separate applications, and you should network intentionally with people inside/outside the FIG group based on which path you want to take. Networking is important at CS to have a chance at getting an interview. Because Michigan is one of their target schools, they will typically come to campus for a presentation and networking session. CS also makes applicants take online tests as part of their application to test cognitive abilities in certain areas. In terms of interviews, typically CS has 2 first round interviews and a super day consisting of 2 more. Generally, these are heavily based on behaviorals. However, be prepared to answer basic questions from the guides."
//     emailformat.innerHTML = "first.last@credit-suisse.com (ie. john.smith@credit-suisse.com)"
//     banklogo.src = "images/banklogos/creditsuisse.png"
// }

const evercore_button = document.querySelectorAll('#evercore')
evercore_button.forEach(element => {
    element.onclick = () =>{
    bankname.innerHTML = "Evercore"
    writeup.innerHTML = "Evercore is considered one of the most prestigious boutique banks. While they are recognized as a boutique shop based on their size, they compete with some of the biggest firms, representing their ambition and strong reputation. Because they have the advisory capabilities of a bulge-bracket firm without any biased motivation, they are able to provide M&A advisory for some of the biggest deals on the street. Some of their strongest groups include technology and healthcare. The firm also prides itself on retention and mobility, with a substantial number of junior bankers choosing to stay within the firm. However, analysts who decide to pursue PE jobs place extremely well too. While Evercore is known for their M&A advisory, their restructuring and private capital advisory teams are strong too. Similar to Moelis, one of their elite boutique counterparts, the summer internship is a generalist experience, and analysts go through group placement during full-time training."
    interviewsum.innerHTML = "The recruiting cycle at Evercore is known to be one of the most technical processes. The process begins with a first round interview, followed up by a second round shortly after if you pass the first. In these interviews, oftentimes Evercore will ask one or two behavioral questions and follow those with only technicals for the rest of the time. Next, the super day is often 4 interviews with more of a mix of behaviorals and technicals. However, the technicals are often more difficult, advanced questions. While networking is important at Evercore, many candidates have gotten interviews with only one or two calls, and many candidates haven’t gotten interviews with 2+ calls. Evercore is most definitely a quality over quantity type of firm, as analysts are extremely busy and it’s difficult to get more than one or two on the phone with you. When you have the opportunity to network with Evercore, take advantage of it."
    emailformat.innerHTML = "first.last@evercore.com (ie. john.smith@evercore.com)"
    banklogo.src = "images/banklogos/evercore.png"
    }
})

const financo_button = document.querySelectorAll('#financo')
financo_button.forEach(element => {
    element.onclick = () =>{
    bankname.innerHTML = "Financo"
    writeup.innerHTML = "Financo is a small firm, but extremely strong in the areas in which it operates. The firm has some of the top MDs on the street in the home goods, fashion, and beauty products industries. Because of this, they thrive in these niche segments, and cover 12 total verticals within the consumer industry. In 2021, they integrated with Raymond James, adding full service capabilities to their arsenal. Financo is made up of approximately 100 bankers, which is extremely small for any investment bank, and results in a tight-knit firm culture. Their experience and expertise in retail and merchandise provides clients with the support they need to be successful. As one can imagine, the deal teams at Financo are super lean, making the analyst experience extremely hands on."
    interviewsum.innerHTML = "Financo’s small analyst class size makes their recruiting process difficult. It is important to network if Financo comes to your campus, and they have recently added UMich to be one of their target schools. The first round interview typically includes both behavioral and basic technical questions. The super day, however, is known to have two interviews, one being extremely technical, and the other being behavioral. The technical interview sometimes includes a paper LBO, while the behavioral interview includes many consumer-based, M&A market questions. In order to land the job, candidates need to effectively show why they want to work at Financo specifically."
    emailformat.innerHTML = "flast@financo.com (ie. jsmith@financo.com)"
    banklogo.src = "images/banklogos/financo.png"
    }
})


const goldman_button = document.querySelectorAll('#goldmansachs')
goldman_button.forEach(element => {
    element.onclick = () =>{
    bankname.innerHTML = "Goldman Sachs"
    writeup.innerHTML = "Goldman Sachs is regarded as the top investment bank. It is the most well known investment bank, and is extremely connected all across the finance world. They are advisors on a majority of the largest deals that come across Wall Street, and they are a full service bank. GS is well known for its apprenticeship programs, with upper level MDs and VPs willing to help interns and analysts learn and grow. Notable groups include TMT, industrials, and leveraged finance, but GS is strong within every sector in which it operates."
    interviewsum.innerHTML = "At Goldman Sachs, networking is essential because they typically receive more applicants than any other firm. Last year, applications opened mid-March, and candidates are recommended to submit as soon as possible. On the application, candidates must select either Classic IB (incl. coverage groups) or Financing IB (incl. product groups). First round interviews are conducted via HireVue, which typically include four behavioral and one investment banking-specific question. Top candidates are then selected for super days, which consists of three, 20-minute interviews. Goldman Sachs focuses much more on behaviorals than technicals, really trying to get a feel for the candidate as a person. That said, market-based questions as well as guide-based technicals are common."
    emailformat.innerHTML = "first.last@gs.com (ie. john.smith@gs.com)"
    banklogo.src = "images/banklogos/goldmansachs.png"
    }
})

const greenhill_button = document.querySelectorAll('#greenhill')
greenhill_button.forEach(element => {
    element.onclick = () =>{
    bankname.innerHTML = "Greenhill"
    writeup.innerHTML = "Greenhill is one of the oldest boutique banks, recently acquired by Mizuho to act as its strategic advisory arm. By leveraging Mizuho’s balance sheet and Greenhill’s reputation for financial advisory, the combined entity will see great deal flow for years to come. Greenhill’s operations will not change drastically because of the merger: they will still offer M&A and restructuring services. There were only 350 bankers at Greenhill when it was its own firm, and that boutique size (of the now Mizuho arm) is anticipated to remain the same. The firm splits their bankers into M&A and restructuring product groups, but doesn’t have industry groups. Deal teams are extremely lean and allow for great client and upper level exposure for analysts."
    interviewsum.innerHTML = "In terms of recruitment, Greenhill will follow the same format as they have previously, and will act independently of Mizuho on that front. Historically, they are known for a smooth, transparent recruiting process. Because of their small size, it’s important to get to know your school representatives. Greenhill was one of the first banks to come to Ann Arbor this past spring which is why it is important to start networking as soon as possible. Fortunately, their analysts are known for being easier to reach than analysts at other firms. First rounds are given purely because of cultural fit, and the recruiting timeline differs from person to person. The first round interview is purely technical and conducted by analysts. The super day consists of 4 interviews, which are known to be technically challenging while also having behavioral portions. The super day interviews are often conducted by upper level bankers."
    emailformat.innerHTML = "first.last@greenhill.com (ie. john.smith@greenhill.com)"
    banklogo.src = "images/banklogos/greenhill.png"
    }
})

const guggenheim_button = document.querySelectorAll('#guggenheim')
guggenheim_button.forEach(element => {
    element.onclick = () =>{
    bankname.innerHTML = "Guggenheim"
    writeup.innerHTML = "Guggenheim prides themselves on being a hardworking, driven firm with a collaborative company culture. The firm pushes to “punch above their weight” and are starting to advise on more of the larger deals on the street. Plus, MDs are known to have an entrepreneurial mindset, finding creative ways to solve problems within their strategic advisory practice. The firm is known to have strong groups in TMT and healthcare. Guggenheim offers a generalist program for the internship before entering into an industry or product group as a full time analyst."
    interviewsum.innerHTML = "Guggenheim focuses heavily on their firm culture. Because of this, they put a strong emphasis on finding candidates who would fit and enhance their culture, making networking extremely important. The rest of the process is atypical. Guggenheim typically flies out candidates for their interview process. The first round is typically a straightforward 30-minute interview with a mix of behaviorals and technicals. Depending on one’s performance, candidates get invited for a final round that day, which consists of two 30-minute interviews with senior bankers. The final round typically focuses on behavioral questions, but on and off-guide technicals may be involved. The firm prioritizes the fit of the applicant during the recruiting process."
    emailformat.innerHTML = "first.last@guggenheimpartners.com (ie. john.smith@guggenheimpartners.com)"
    banklogo.src = "images/banklogos/guggenheim.png"
    }
})

const houlihan_button = document.querySelectorAll('#houlihanlokey')
houlihan_button.forEach(element => {
    element.onclick = () =>{
    bankname.innerHTML = "Houlihan Lokey"
    writeup.innerHTML = "Houlihan Lokey is a middle market firm known for their elite restructuring services. The firm is very decentralized compared to other banks, with similar sized offices across the US and the world. They are an extremely global firm, ranking highly in terms of global M&A transactions advised on each year. Evidently, they have a strong M&A advisory practice to complement their restructuring division. The analyst program at Houlihan Lokey lasts for 3 years rather than 2, as well as their associate program. The firm prides itself on maintaining talent and internal upward movement."
    interviewsum.innerHTML = "The recruiting process at Houlihan Lokey varies from year to year, but is known to be generally more intense than the average firm. In past years, there have been 2 networking phone call screenings, and then 1 or 2 more interviews before a super day. The screenings are known to be slightly more important than typical networking calls. For the restructuring group, Houlihan is known to get extremely technical during their interviews. For their advisory side, the interviews are known to be a standard mix of behaviorals and technicals. The super day consists of 3 interviews with two bankers each. Two of these interviews are behavioral, while one is straight technical. The firm values networking before the interviews and wants to hire applicants who can confidently answer why they want to work at Houlihan Lokey specifically."
    emailformat.innerHTML = "flast@hl.com (ie. jsmith@hl.com)"
    banklogo.src = "images/banklogos/houlihanlokey.png"
    }
})

const jefferies_button = document.querySelectorAll('#jefferies')
jefferies_button.forEach(element => {
    element.onclick = () =>{
    bankname.innerHTML = "Jefferies"
    writeup.innerHTML = "Jefferies is a middle market firm. Their analysts are often known to be motivated, hardworking, and excited about the work that they do. Jefferies is known for having a “work hard, play hard” company culture, as many of their analysts have outgoing, social personalities, but they know how to get their work done. This positive culture is enhanced by how involved MDs and C-Suite executives are in junior bankers’ development. Jefferies is growing and pushing to get into the mix with larger bulge-bracket deals. They specialize in healthcare, while also having a strong presence in technology, and media & entertainment. These groups are known to be highly sought after by incoming analysts because they typically do their M&A work in house, whereas other groups at the firm send complex M&A work to the M&A team. Jefferies also has strong leveraged finance and industrials teams. Michigan is at the core of Jefferies recruiting efforts, as many of the analysts and higher ups at the firm are alumni of UM. The internship is a generalist experience, but full time analysts stay within a product or industry group after a ranking/matching process."
    interviewsum.innerHTML = "Jefferies comes to Ann Arbor early in the recruiting process and offers more spots to Michigan students than just about any other bank. Their recruiting process is networking heavy, as the successful candidates who receive offers almost always speak to at least 5-7 bankers. When they come to campus, their first round is one 45 minute interview. Interviewers look for interpersonal skills, along with clear understanding of the concepts behind the BIWS guides. They choose their favorite candidates (based on the interview and previous networking) to attend a Chop House networking dinner that same night to then decide on offers."
    emailformat.innerHTML = "flast@jefferies.com (ie. jsmith@jefferies.com)"
    banklogo.src = "images/banklogos/jefferies.png"
    }
})

const jpmorgan_button = document.querySelectorAll('#jpmorgan')
jpmorgan_button.forEach(element => {
    element.onclick = () =>{
    bankname.innerHTML = "JP Morgan"
    writeup.innerHTML = "JP Morgan is considered one of the top three firms across the board. JPM has developed strongholds in just about every area of the finance industry, known for their global presence and expert personnel. JPM recently acquired First Republic Bank after the biggest U.S. bank failure since 2008, acquiring all of their deposits and a substantial majority of their assets. This only deepened their US presence. Plus, the firm leverages their large balance sheet through loans to clients, and has many strong opportunities for recruiting students: from IB to DCM, ECM, and S&T. JPM focuses on upward internal mobility, as many analysts and associates rise through the ranks to VPs and MDs."
    interviewsum.innerHTML = "JPM has moved towards a more centralized recruiting model, limiting their target schools to Wharton and select Ivys. This gives candidates from non-targets more spots to compete for, and a better shot at landing interviews. Networking may be difficult, as bankers are known to be less responsive than other bulges, but it’s definitely important for earning an interview. After submitting the formal application, candidates are sent a first round interview via HireVue. The HireVue typically contains a few behavioral questions and basic technical walk-throughs. From there, candidates proceed straight to the super day, which consists of three 30 minute interviews. The interviews are known to be a mix of technicals and behaviorals, and the questions challenge the candidate's conceptual understanding of the markets. A few problem-solving teasers may be asked as well."
    emailformat.innerHTML = "first.last@jpmorgan.com (ie. john.smith@jpmorgan.com)"
    banklogo.src = "images/banklogos/jpmorgan.png"
    }
})

const lazard_button = document.querySelectorAll('#lazard')
lazard_button.forEach(element => {
    element.onclick = () =>{
    bankname.innerHTML = "Lazard"
    writeup.innerHTML = "Lazard is an elite boutique firm. They have a long history of being an extremely intelligent and trustworthy advisor. Lazard can be described as a white shoe, old school firm. They’re known as top tier in financial advisory and restructuring, while also having an asset management arm. They are also known for being one of the largest independent advisory firms, working mainly on middle-market deals. While Michigan isn’t a main target school, Lazard has a collegiate work culture, with analyst class representation from Ivys, Duke, Vanderbilt, Notre Dame, and many Big 10 schools. The internship is known to be generalist."
    interviewsum.innerHTML = "The recruiting process for Lazard is pretty typical. For certain target schools, they come to campus for coffee chats, and it is important to sign up for one to demonstrate interest. Besides that, networking isn’t known to be extremely important at Lazard, however as always, the more calls candidates can get in the better. The first round interview is typically split between behaviorals and technicals. The first half is more conversational, getting to know the candidate and their resume, while the technical side often comes straight from the guides. Some interviewers, however, focus more on restructuring based technicals, so be sure to familiarize yourself with how debt operates before a first round with Lazard. The super day is typically 3 interviews with higher level bankers. Often it is only behavioral, allowing MDs and VPs to get a better sense of each candidate’s personality and whether or not they’d be a good fit at the firm."
    emailformat.innerHTML = "first.last@lazard.com (ie. john.smith@lazard.com)"
    banklogo.src = "images/banklogos/lazard.png"
    }
})

const macquarie_button = document.querySelectorAll('#macquarie')
macquarie_button.forEach(element => {
    element.onclick = () =>{
    bankname.innerHTML = "Macquarie"
    writeup.innerHTML = "Macquarie is a global bank. They are the largest firm in Australia and have a strong middle market presence in the United States. The firm specializes in their software and services groups, while also having a large leveraged finance team on the product side. Work culture at Macquarie is a huge staple to the company, bringing the Australian norm of a more relaxed workplace into the US. The relationship between their Australian and American offices is incredibly strong, including location flexibility for all workers."
    interviewsum.innerHTML = "Macquarie has a relatively standard recruiting process. Networking with a couple analysts is important and will help push candidates into an interview. First round interviews are typically split between technical and behavioral questions, while the super days have much more of a focus on getting to know the candidate. Macquaries interviews are known for being more like conversations than Q and As, which is representative of the genuine and relaxed firm culture."
    emailformat.innerHTML = "first.last@macquarie.com (ie. john.smith@macquarie.com)"
    banklogo.src = "images/banklogos/macquarie.png"
    }
})

const mizuho_button = document.querySelectorAll('#mizuho')
mizuho_button.forEach(element => {
    element.onclick = () =>{
    bankname.innerHTML = "Mizuho"
    writeup.innerHTML = "Mizuho is an international, full service, bulge-bracket firm. Headquartered in Tokyo, Mizuho has 65k employees and $2 trillion under management, making it one of the largest firms across the world. The firm’s strengths on the product side is their debt capital markets team, while also having a strong ECM and M&A group. On the industry side, TMT is their biggest group and it's where they generate the most revenue. They stress the idea of “One Mizuho,” representing the concept that all different products and industries work together on deals to deliver the best to clients. Mizuho recently acquired Greenhill to strengthen their strategic advisory branch, but they are anticipated to host separate IB internship programs for the upcoming cycle."
    interviewsum.innerHTML = "Mizuho typically visits Ann Arbor for a networking event on the early side of the recruiting process. Networking is not known to be incredibly important at Mizuho, as some candidates receive interviews without more than a call or two, but having a solid network will definitely help towards landing one. A month or two after the networking events, the interview process kicks off. The interview process typically consists of two behavioral interviews that cover current events, the markets, and the candidate's resume, with little to no emphasis on technicals from the guide. Most of the time these interviews are conducted by one junior banker and one managing director. In some years, this first round is followed by a super day, and in other years they give offers right after. Past candidates believe that this depends on the circumstances, and may change each year."
    emailformat.innerHTML = "first.last@mizuhogroup.com (ie. john.smith@mizuhogroup.com)"
    banklogo.src = "images/banklogos/mizuho.png"
    }
})

const mk_button = document.querySelectorAll('#mkleinco')
mk_button.forEach(element => {
    element.onclick = () =>{
    bankname.innerHTML = "M. Klein & Co"
    writeup.innerHTML = "M. Klein & Company is an extremely unique investment bank. The firm prides itself on client confidentiality, as they have no full website, they don’t publicize deals, and it is very difficult to contact their bankers. Michael Klein is known for his success and status in the banking industry, which is a main reason for the firm's strong reputation. The bank is very small in terms of people, and analysts are known to be exceptionally smart and technically sound. The firm works on deals across the world, and is especially strong in natural resources. In light of their terminated merger with Credit Suisse, M. Klein is looking for a traditional junior year summer internship class, as well as incoming full-time analysts. The firm is also generalist throughout."
    interviewsum.innerHTML = "The recruiting process at M. Klein, as one can imagine, is similarly unique. Networking is completely unimportant. They only accept candidates from their 6 target schools (Michigan is included as one). They host coffee chats for one day at each target school, and that is a candidate’s one opportunity to network unless they have a personal connection to the firm. Based on that conversation, candidates may be asked to a first round technical interview. If they pass that test, they are invited to a second technical interview the next day, which is known to be extremely difficult; consisting of many technical questions that are off the guide. The final round is a super day that is typically 4 hours long (15-20 minute conversations), with a mix of both behavioral and technical questions."
    emailformat.innerHTML = "first.last@mkleinandcompany.com (ie. john.smith@mkleinandcompany.com)"
    banklogo.src = "images/banklogos/mkleinco.png"
    }
})

const morganstanley_button = document.querySelectorAll('#morganstanley')
morganstanley_button.forEach(element => {
    element.onclick = () =>{
    bankname.innerHTML = "Morgan Stanley"
    writeup.innerHTML = "Morgan Stanley is considered one of the big 3 investment banks. This full service, bulge-bracket firm is known for being a leader across the banking world, with arguably the most prestigious M&A advisory department. MS doesn’t have as big of a balance sheet as GS or JPM, which contributes to their top-notch, unbiased, M&A advisory efforts. In terms of industry groups, MS is specifically strong in TMT. Many attribute the firm’s long history of success to their company values and how they have stuck to them throughout the years. These values are, “Do the right thing, put clients first, lead with exceptional ideas, commit to diversity & inclusion, and give back.” MS truly puts these values first, and they talk about them religiously throughout the recruiting process."
    interviewsum.innerHTML = "Morgan Stanley’s recruiting process begins with a Hirevue. It typically just asks some behavioral questions to get to know you better. It’s important to stand out during this HireVue, or to get your foot in the door through networking, which can be difficult at MS. The following round is a phone call interview, which is mainly behavioral with some technicals and market sizing questions as well. Finally, the super day is typically 3 interviews with upper level bankers, with some easier technicals, and much more behaviorals. MS puts a huge emphasis on seeing if their candidates fit the personable culture of the firm, coupled with the ability to work well under pressure."
    emailformat.innerHTML = "first.last@morganstanley.com (ie. john.smith@morganstanley.com)"
    banklogo.src = "images/banklogos/morganstanley.png"
    }
})

const perellaweinberg_button = document.querySelectorAll('#perellaweinberg')
perellaweinberg_button.forEach(element => {
    element.onclick = () =>{
    bankname.innerHTML = "Perella Weinberg"
    writeup.innerHTML = "Perella Weinberg Partners, or PWP, is a top tier boutique investment bank. The firm is known to have great deal flow and smart analysts, with a big emphasis on company culture. They care more about work-life balance than many of the other firms on the street, and it’s known that they won’t work their analysts to the bone. In terms of M&A advisory, PWP specializes in healthcare, with a strong consumer retail group as well. Their internship program is generalist across products and industries, meaning summer analysts may work on M&A and restructuring deals across sectors. They strive to hire analysts who are all-in on the firm, as they want people who are looking to stay long-term and make a difference on the firm’s young history."
    interviewsum.innerHTML = "The recruiting process at PWP requires preliminary networking to receive a Dartmouth Partners interview screen. Dartmouth Partners is a recruiting firm that typically leads the first round interviews for PWP. The first round usually consists of a mix of behaviorals and technicals. Candidates who make it past this round go straight to the super day, which consists of 4 in-person interviews. They want to understand why candidates specifically want to work at the firm, so only those who can show genuine interest in PWP will succeed. The super day typically consists of 2 behavioral interviews, a technical interview, and a markets/current events interview."
    emailformat.innerHTML = "flast@pwpartners.com (ie. jsmith@pwpartners.com)"
    banklogo.src = "images/banklogos/perellaweinberg.png"
    }
})

const piper_button = document.querySelectorAll('#pipersandler')
piper_button.forEach(element => {
    element.onclick = () =>{
    bankname.innerHTML = "Piper Sandler"
    writeup.innerHTML = "Piper Sandler operates as a middle market investment bank that extends internship opportunities to candidates in New York. The firm was ranked as the #2 advisors in the US for M&A deals valued under $1 billion, representing their strength in smaller sized deals. Piper Sandler boasts robust industry expertise, particularly in healthcare and technology. Over the years, the firm has expanded through strategic acquisitions, successfully integrating new entities into its operations. The culture of the firm is segmented based on the group, mainly due to its acquisition history."
    interviewsum.innerHTML = "To initiate the application process, candidates are required to submit a formal application. Subsequently, the bank offers a first-round interview conducted via HireVue. The HireVue typically contains both fundamental technical and behavioral questions. It is important to understand the firm’s history and why you truly want to work at PS to perform well in the interview. The process advances directly to a super day, typically consisting of three 30 minute interviews. The super day mainly focuses on behaviorals, with light technicals touched upon too."
    emailformat.innerHTML = "first.last@psc.com (ie. john.smith@psc.com)"
    banklogo.src = "images/banklogos/pipersandler.png"
    }
})

const pjt_button = document.querySelectorAll('#pjt')
pjt_button.forEach(element => {
    element.onclick = () =>{
    bankname.innerHTML = "PJT"
    writeup.innerHTML = "PJT Partners is an elite boutique bank, with extremely strong strategic advisory and restructuring practices. Although the firm is incredibly young, created in 2015, PJT takes on some of the largest global M&A deals, while maintaining the intimacy of a small boutique firm. PJT also has a separate division, Park Hill, which focuses on alternative asset advisory, fundraising, capital solutions, and portfolio advisory. PJT is also known to have passionate, driven bankers who reflect the firm’s young and entrepreneurial spirit. The firm is generalist throughout both the internship program and full time. PJT has a strong base of Michigan alumni, so they come to campus looking for some U of M sophomores to enter their intern class."
    interviewsum.innerHTML = "It is important to network early and often with PJT. They typically travel to their target schools in the spring, and host an information session and sometimes an invite-only networking event too. Attending those events are important for landing an interview, so be sure to network well prior to the firm coming to campus. PJT analysts are also known to be more difficult to reach than analysts at other firms, so getting referrals after having a good conversation with a banker is definitely important. The first round interview is typically technical heavy (known to be relatively difficult), with some behaviorals as well. The super day is typically 4 interviews, two of each type."
    emailformat.innerHTML = "first.last@pjtpartners.com (ie. john.smith@pjtpartners.com)"
    banklogo.src = "images/banklogos/pjt.png"
    }
})

const raine_button = document.querySelectorAll('#raine')
raine_button.forEach(element => {
    element.onclick = () =>{
    bankname.innerHTML = "Raine"
    writeup.innerHTML = "Raine is an integrated merchant bank that advises and invests solely in the TMT sector. They work on debatably the coolest deals on the street, ranging from the sale of sports teams to the purchasing of large-scale media companies. In addition to their advisory services, they manage a TMT focused investment fund, doing work in growth equity, venture capital and public markets, with more than $3.8 billion in current assets under management. Analysts spend their time working on a mix of advisory and investments daily."
    interviewsum.innerHTML = "The analyst classes at Raine are extremely small, ranging from 8-12 every year, making the recruiting process extremely competitive. It is super important to network well, specifically with alumni from your school. In the first round interview, bankers try to decipher which candidates have a deep interest and understanding of the TMT sector, often asking about current events and trends in the industry. Specific TMT-related technicals are also asked. The Raine super day is a test of one’s passion for TMT. The interviews focus on their portfolio companies, industry trends, and more questions about TMT related concepts."
    emailformat.innerHTML = "flast@raine.com (ie. jsmith@raine.com)"
    banklogo.src = "images/banklogos/raine.png"
    }
})

const rbc_button = document.querySelectorAll('#rbc')
rbc_button.forEach(element => {
    element.onclick = () =>{
    bankname.innerHTML = "RBC"
    writeup.innerHTML = "RBC is a growing, full service investment bank. It’s often referred to as an “inbetween bank,” with a mix of bulge-bracket and middle market tendencies. Their strongest product is their M&A advisory service, however they also have a top leveraged finance team. RBC is the largest bank in Canada, and one of their primary focuses has been an expansion of their US operations. The firm has grown tremendously, and they have increased their market share by taking on more deal volume. They thrive in more of the gritty industry groups, such as industrials, power and utilities, and FIG, rather than more flashy ones like TMT and healthcare. RBC is also known for having a collaborative, collegiate company culture."
    interviewsum.innerHTML = "It’s important to network with your school’s representatives to get your foot in the door at RBC. The rule of thumb is quality over quantity, although making strong connections with multiple bankers can help solidify an interview. The recruiting process for RBC is extensive. The first round interview is typically 30 minutes and sticks to a mixture of behavioral and basic technical questions. Next, they host a 30 minute second round interview with similar content, but with a more senior banker. Lastly, RBC hosts a super day with three 30 minute interviews. The super day includes behavioral, market-based, and on-the-guide technical questions. The process can be drawn out over many weeks, making it important to continue networking with RBC bankers in between interviews."
    emailformat.innerHTML = "first.last@rbccm.com (ie. john.smith@rbccm.com)"
    banklogo.src = "images/banklogos/rbc.png"
    }
})

const solomon_button = document.querySelectorAll('#solomonpartners')
solomon_button.forEach(element => {
    element.onclick = () =>{
    bankname.innerHTML = "Solomon Partners"
    writeup.innerHTML = "Solomon Partners is a middle-market firm known for their consumer retail and grocery teams. The firm was founded when a vice chairman at Lehman Brothers, Peter J. Solomon, left to create his own investment bank in 1989. In 2016, Natixis, a French financial services company, acquired 51% of Solomon Partners. Since being acquired, Solomon has doubled in size, expanded into 6 more verticals, and gained a more global reach. The firm’s top groups are consumer retail and grocery, pharmacy & restaurants. Their main focus is in M&A, with some debt and equity advisory products as well. Company culture at Solomon is highly regarded, with many analysts attesting to their love for their company and job."
    interviewsum.innerHTML = "The recruiting process at Solomon Partners occurs on a rolling basis, which is different from most firms. Prior to interviews, candidates will have a brief screening phone call with a banker or HR representative. The first round interview, which typically has rolling invites, consists of one, 30 minute interview, usually with two analysts. They typically ask a mix of standard technicals and casual behaviorals. Following first round interviews, you may be invited to a super day. Each super day has 3 interviews with 2 bankers each, ranging from analysts to MDs, consisting of both technical and behavioral questions. Questions are definitely more on the behavioral and qualitative side, with a few technicals asked within. Throughout the process, interviewers are often thought of as friendly, respectful people. However, it is oftentimes difficult to network at Solomon (low response rates), so be sure to reach out to enough connections, alumni, and potentially their HR team in hopes to get an interview."
    emailformat.innerHTML = "first.last@solomonpartners.com (ie. john.smith@solomonpartners.com)"
    banklogo.src = "images/banklogos/solomonpartners.png"
    }
})


const ubs_button = document.querySelectorAll('#ubs')
ubs_button.forEach(element => {
    element.onclick = () =>{
    bankname.innerHTML = "UBS"
    writeup.innerHTML = "Founded and based in Switzerland, UBS is a full service, bulge-bracket, international bank with a strong investment banking arm. Their main products are M&A advisory and leveraged finance, although they have strong asset and wealth management divisions as well. Despite their large size, the firm stresses that they have lean deal teams to give analysts great hands-on experience. They care a lot about the interconnectivity of their groups, which is representative of the supportive firm culture. After candidates receive an offer, they go through a matching process with product and coverage groups to determine their official group for the summer and potentially full time as well."
    interviewsum.innerHTML = "To get an interview at UBS, candidates should try to network well with their school’s alumni. UBS typically starts their recruiting process with numerical and logical reasoning assessments upon application submission. The next round is a HireVue, which typically consists of 8–10 questions. The final round is a 3 interview super day, which consists of a mix between behavioral and technical questions. The technicals are noted to be standard questions from the guides, similar to most bulge bracket interviews."
    emailformat.innerHTML = "first.last@ubs.com (ie. john.smith@ubs.com)"
    banklogo.src = "images/banklogos/ubs.png"
    }
})


const william_button = document.querySelectorAll('#williamblair')
william_button.forEach(element => {
    element.onclick = () =>{
    bankname.innerHTML = "William Blair"
    writeup.innerHTML = "William Blair is a full service, middle market firm. The firm is known for their M&A sell-side focus, and strength in the healthcare industry, specifically in biotech. The firm praises their flat culture, lean deal teams, and repeat clients. William Blair is known for great company culture, representing a collegiate atmosphere and midwestern values. The internship program recruits candidates into the Chicago and New York offices."
    interviewsum.innerHTML = "William Blair has an extensive recruiting process. Networking isn’t overly important, however strong connections can help to secure an interview. The process typically begins with a pre-recruiting online assessment, followed by a call with HR, and invite-only coffee chats for some of their target schools. The first round interview is known to be both fit-based and technical. The majority of the questions are straightforward and from the guides. The final round is typically five 30 minute interviews with minimal technicals asked throughout. In some years, William Blair has asked candidates to complete a paper LBOs during an interview."
    emailformat.innerHTML = "flast@williamblair.com (ie. jsmith@williamblair.com)"
    banklogo.src = "images/banklogos/williamblair.png"
    }
})

//NEED INFO//


const tdcowen_button = document.querySelectorAll('#cowen')
tdcowen_button.forEach(element => {
    element.onclick = () =>{
    bankname.innerHTML = "Cowen"
    writeup.innerHTML = "TD Cowen is a full service, middle market firm. The firm was recently acquired by TD Securities, providing them with a significant balance sheet to work with in creating deals. This deal was mutually beneficial as TD Securities did not initially have a strong investment banking arm, and Cowen did not have the balance sheet to compete with some of the larger firms. Cowen MDs have always stressed the idea that their firm is extremely disruptive, which means that they predict up and coming industries and try to get involved in them early. Some industries Cowen has jumped on in the past include cannabis, crypto-currency, and electric vehicles. Cowen acquired a firm based out of Detroit in 2018, so since then, they have recruited more from U of M. Their full service capabilities allow analysts to decide between IB, ECM and DCM teams, while the investment bankers have a generalist program. Firm culture at Cowen is predicated on honesty and open communication."
    interviewsum.innerHTML = "Networking at Cowen is important, as it’s definitely easier to get an interview after making a connection with an analyst. Plus, they care a lot about genuine interest in the firm. The networking calls at Cowen tend to be evaluative, and if a call goes well, they sometimes pass candidates along to more senior level bankers for further screening. The official first round interview is typically led by bankers of varying ages, and contains behaviorals and technicals (both on and off the guides). Finally, their top candidates are selected to participate in both an in-person networking event at Chop House, as well as a three interview super day in New York with senior bankers."
    emailformat.innerHTML = "TBD"
    banklogo.src = "images/banklogos/cowen.png"
    }
})

const creditsuisse_button = document.querySelectorAll('#creditsuisse')
creditsuisse_button.forEach(element => {
    element.onclick = () =>{
    bankname.innerHTML = "Credit Suisse"
    writeup.innerHTML = "Credit Suisse is a well known, full service, bulge-bracket investment bank. Recently, the company has been in the news as they suffered billions of dollars in losses over the past couple years. However, the firm has been working hard with many internal changes to fight back and turn the corner. Though the firm has had its struggles, CS remains a best-in-class name for helping advance young finance careers into areas such as PE and VC. The firm has lean deal teams across the board, which is rare out of a bulge-bracket. Plus, the culture is known as extremely collegiate, representing a strong company environment."
    interviewsum.innerHTML = "CS recruits through 2 programs. First is their traditional IB program, and the second is directly into their Financial Institutions Group (FIG). These 2 programs have two separate applications, and you should network intentionally with people inside/outside the FIG group based on which path you want to take. Networking is important at CS to have a chance at getting an interview. Because Michigan is one of their target schools, they will typically come to campus for a presentation and networking session. CS also makes applicants take online tests as part of their application to test cognitive abilities in certain areas. In terms of interviews, typically CS has 2 first round interviews and a super day consisting of 2 more. Generally, these are heavily based on behaviorals. However, be prepared to answer basic questions from the guides."
    emailformat.innerHTML = "first.last@credit-suisse.com (ie. john.smith@credit-suisse.com)"
    banklogo.src = "images/banklogos/creditsuisse.png"
    }
})
