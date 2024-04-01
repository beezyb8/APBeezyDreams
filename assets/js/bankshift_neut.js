const bankname = document.querySelector('#bankname')
const writeup = document.querySelector('#writeup')
const interviewsum = document.querySelector('#interviewsum')
const emailformat = document.querySelector('#emailex')
const banklogo = document.querySelector(".banklogo")
const writtencont = document.querySelector(".writtencont")
const notescont = document.querySelector(".notescont")
const contactcont = document.querySelector(".contactcont")
const homepage = document.querySelector(".homepage")
const appcont = document.querySelector(".app_cont")
const applink_btn = document.querySelector(".applink_modal")
const abus_hide = document.querySelector(".abus_hide")
const disc_hide = document.querySelector(".disclaimer_cont")
const all_switches = document.querySelectorAll(".switch")



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

var bankidlistarray = ['allenco','bankofamerica','barclays','bmo','centerview','citigroup','cowen','creditsuisse','evercore','financo','goldmansachs','greenhill','guggenheim','houlihanlokey','jefferies','jpmorgan','lazard','macquarie','mizuho','mkleinco','moelis','morganstanley','perellaweinberg','pjt','raine','rbc','rothschild','solomonpartners','ubs','williamblair'] 

// Manipulate this below!!!
// Create an OG PAGE with elements explaining how to use this page!
$(document)
.on('click', ".switch", function(event) {
    scroll(0,0)
    var thisid = $(this).attr("id");
    var thistitle = $(this).attr("value");
    if(!bankidlistarray.includes(thisid)){
        bankname.innerHTML = thistitle;
        writtencont.style.display = "none";
        appcont.style.display = "none";
        applink_btn.style.display = "block";
        banklogo.style.display = "none";
        notescont.style.display = "block";
        contactcont.style.display = "block";
        homepage.style.display = "none";
        abus_hide.style.display = "none";
        disc_hide.style.display = "none";
    } else{
        writtencont.style.display = "block";
        banklogo.style.display = "block";
        notescont.style.display = "block";
        contactcont.style.display = "block";
        appcont.style.display = "none";
        applink_btn.style.display = "block";
        homepage.style.display = "none";
        abus_hide.style.display = "none";
        disc_hide.style.display = "none";
    }
    all_switches.forEach(function(dat){
        var bank_title_for_comp = bankname.innerHTML;
        var bank_title_for_comp = bank_title_for_comp.replaceAll("&amp;","&");
        console.log(bank_title_for_comp)
        if(dat.getAttribute("value") == bank_title_for_comp){
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



const rothschild_button = document.querySelector('#rothschild')
rothschild_button.onclick = () =>{
    bankname.innerHTML = "Rothschild"
    writeup.innerHTML = "Rothschild, founded in the early 1800’s, is one of Europe’s oldest and most well known banks. In the US, Rothschild operates as a middle-market firm, with a particularly strong restructuring division. Besides their global advisory services, the bank also has solid wealth management, asset management, and merchant banking arms. The firm takes pride in caring about their employees and the long term health of the company, rather than managing their operations on a quarter to quarter basis. This was reflected by the firms recent decision to go private. Rothschild's values and care for their employees, combined with the firm’s deep European roots, creates a respectable culture that is well known and admired across Wall Street."
    interviewsum.innerHTML = "At target schools, Rothschild does not place a heavy emphasis on networking calls. It’s important to make a few connections at the firm, but getting an interview is not solely dependent on networking. The first round interview at Rothschild is all technical, testing your understanding and ability to speak concisely about technical content and how they pertain to general business. The first round is followed by a 2 interview super day which is much more behavioral. This allows the upper level bankers to get more of a feel for the candidate."
    emailformat.innerHTML = "first.last@rothschildandco.com (ie. john.smith@rothschildandco.com)"
    banklogo.src = "../images/banklogos/rothschild.jpg"
}

const moelis_button = document.querySelector('#moelis')
moelis_button.onclick = () =>{
    bankname.innerHTML = "Moelis"
    writeup.innerHTML = "Moelis is a very prestigious boutique firm. The bank is known for their services in M&A advisory and restructuring across many different sectors. They mainly focus on the middle market, and the firm has extremely high deal flow. Moelis is known for their hard working analysts to stay on top of the deal flow. Interns and analysts work extremely closely with their MDs, which is a huge part of Moelis’s top-notch education. This leads to many Moelis analysts landing jobs at top PE firms after two years on the job."
    interviewsum.innerHTML = "Networking is extremely important for securing an interview at Moelis. The first round interview for Moelis is definitely more technical than the typical firm. It tests more overarching ideas, concepts, and business skills pertaining to investment banking. If you pass the first round, the super day consists of 2 interviews with MDs: one being technical and the other being behavioral."
    emailformat.innerHTML = "first.last@moelis.com (ie. john.smith@moelis.com)"
    banklogo.src = "../images/banklogos/moelis.jpg"
}

//NEED INFO//
const allen_button = document.querySelector('#allenco')
allen_button.onclick = () =>{
    bankname.innerHTML = "Allen & Co"
    writeup.innerHTML = "Allen & Co is a top boutique investment bank. Upon creation, the firm employed 175 bankers, and has stayed that small ever since. The bank is strictly relationships based, meaning all of their work and deals are focused on long term relationships. On the product side, they are a full service bank, which is rare for a bank so small. Their main industry focus is in TMT, with some new strides in healthcare. However, all analysts are generalists because of how small the firm is. By the same token, all deal teams are very lean, most of the time being 4 bankers per deal, one of each position. The firm is known as a fun place to work, as the tight-knit nature of the bank creates a good work environment."
    interviewsum.innerHTML = "The internship program at Allen & Co is relatively unique. Their intern classes tend to be around 15 students, making this bank extremely difficult to receive an offer at. Additionally, they don’t have a main target school as their class has interns from all over the country. It’s important to network well at this firm, and a personal connection definitely helps to get your foot in the door. For most years, their application is due earlier than other banks, so be on the lookout for Allen & Co deadlines. Traditionally, the process consists of 3 interviews, with technicals noted to be more difficult than the average interview."
    emailformat.innerHTML = "firstinitiallastname@allenco.com (ie. jsmith@allenco.com)"
    banklogo.src = "../images/banklogos/allenco.jpg"
}

const bofa_button = document.querySelector('#bankofamerica')
bofa_button.onclick = () =>{
    bankname.innerHTML = "Bank of America"
    writeup.innerHTML = "Bank of America is a bulge bracket bank, well known for their global advisory services across the United States. After acquiring Merrill Lynch in 2009, Bank of America gained invaluable connections across the business world, and used these connections to become a leader in the investment banking industry. In terms of banking, B of A is known for their strengths in healthcare, TMT, and financial sponsors. With that said, B of A still spans across nearly all industry sectors."
    interviewsum.innerHTML = "For target schools, Bank of America is one of the more hands-on recruiting processes. There are many networking opportunities for schools in which B of A travels to. If you go to a school that B of A doesn’t target, be sure to network well to land an invitation to conduct a HireVue. After the HireVue, the firm hosts superdays which are standard for a large bulge-bracket firm; including 3 interviews with a mix of behaviorals and technicals."
    emailformat.innerHTML = "first.last@bofa.com (ie. john.smith@bofa.com)"
    banklogo.src = "../images/banklogos/bofa.png"
}

const barclays_button = document.querySelector('#barclays')
barclays_button.onclick = () =>{
    bankname.innerHTML = "Barclays"
    writeup.innerHTML = "Barclays is a full service, bulge bracket investment bank. Unlike the rest of the bulge brackets on the street, Barclays is headquartered in the UK. This is representative of their global firm as they are making an impact on companies across the globe. One thing that Barclays is known for is their more chill and laid back company culture in comparison to other firms. One of Barclays’s strengths is known to be their power and utilities group. Besides that vertical, Barclays is a super well rounded firm, with solid groups across the board."
    interviewsum.innerHTML = "Barclays’s recruiting process starts a bit later than most firms. Late in the spring, they have a first round HireVue. Next, typically in June, they have a second round screening phone call where they typically ask basic behavioral questions to get to know the candidate. Finally, super days are typically just two interviews led by high level bankers, one being technical, and the other behavioral. The technicals are typically conceptual, off the guide, questions to test understanding of main business and finance ideas."
    emailformat.innerHTML = "first.last@barclays.com (ie. john.smith@barclays.com)"
    banklogo.src = "../images/banklogos/barclays.jpg"
}

const bmo_button = document.querySelector('#bmo')
bmo_button.onclick = () =>{
    bankname.innerHTML = "BMO"
    writeup.innerHTML = "BMO, short for the Bank of Montreal, is a middle market investment bank and financial services company. The firm is one of the oldest banks in Canada, founded in 1817, and has been headquartered there ever since. They now have offices in the US, mainly known for their NYC, Chicago, and San Francisco presence. The firm is known to uphold Canadian values, and is thought of as more relaxed than the typical firm. BMO has many different industry groups, but they’re most known for their global metals & mining group. Interns are placed into industry groups for the internship and for their full time jobs. The firm is also known to prioritize sustainability initiatives, and the growth of their interns."
    interviewsum.innerHTML = "BMO has a pretty standard recruiting process. Be sure to network well at BMO by reaching out to bankers who are alumni of your school. The first round interview is mainly behavioral, with some basic technicals asked. Likewise, the super day is known to be both behavioral and technical, with the technicals noted to be a little more difficult than the first round."
    emailformat.innerHTML = "first.last@bmo.com (ie. john.smith@bmo.com)"
    banklogo.src = "../images/banklogos/bmo.png"
}
const centerview_button = document.querySelector('#centerview')
centerview_button.onclick = () =>{
    bankname.innerHTML = "Centerview"
    writeup.innerHTML = "Centerview is known as one of the top boutiques on the street. With a huge emphasis on banker development and retention, the analyst program at Centerview lasts for 3 years, and approximately 50% of each analyst class stays until they are associates. The firm has the traditional boutique model of strong M&A advisory and restructuring services. Although the firm is generalist, they are known for specializing in consumer retail and health care. This firm produces career bakers, and they care deeply about the development of their analysts. Partners are involved in the analyst experience, and the firm gives analysts great benefits, as they are known for being the highest paying bank on the street."
    interviewsum.innerHTML = "Centerview definitely has an atypical recruiting process. As of 2022, their traditional recruiting process consists of a campus visit at their target schools in the spring and interviews in the fall. However, they may be pushing up their timeline to compete with other banks, so be on the lookout for Centerview emails. Additionally, if you have an expiring offer and you networked well at Centerview, you could attempt to get your interview process expedited into the spring. Another interesting thing about the process is that in some years they have no formal application, and you must get selected for an interview solely through networking, which is why networking is so important at the firm. In terms of interviews, the first round consists of two: one behavioral and one technical. The super day is then typically 4 interviews: two of which are behavioral, one is technical, and one final interview tests creative problem solving. They look for out-of-the-box, creative applicants who have clear reasons for wanting to do IB, specifically at Centerview."
    emailformat.innerHTML = "firstinitiallastname@centerview.com (ie. jsmith@centerview.com)"
    banklogo.src = "../images/banklogos/centerview.png"
}
const citibank_button = document.querySelector('#citigroup')
citibank_button.onclick = () =>{
    bankname.innerHTML = "Citigroup"
    writeup.innerHTML = "Citigroup is a strong bulge-bracket firm. Citi offers many different products to a wide range of clients, working on some of the biggest deals each year. Citi is known for their strong industrials group. However, on the product side, the M&A group is known for being a top-notch team because it is the execution center of the aforementioned big deals. Additionally, the internship program is group-based. After group placement in the spring, interns work in product or industry groups throughout the summer and full time."
    interviewsum.innerHTML = "Networking at Citi, like any bulge, is definitely important, so try your best to talk to 2+ analysts. Sometimes, analysts will pass you off to an older banker after a networking call if they enjoyed speaking with you and believe you’re a strong candidate. The interview process is pretty typical for a bulge bracket firm, with one first round and a 3 interview super day. During the super day, one round is known to be “leadership based,” letting interviewers see how you act in certain situations. The second interview is more experience/resume based, and the final is all reasonable technicals."
    emailformat.innerHTML = "first.last@citi.com (ie. john.smith@citi.com)"
    banklogo.src = "../images/banklogos/citi.jpg"
}
const cowen_button = document.querySelector('#cowen')
cowen_button.onclick = () =>{
    bankname.innerHTML = "Cowen"
    writeup.innerHTML = "Cowen is a full service, middle market firm. In recruiting sessions, they stress the idea that their firm is extremely disruptive, which means that they predict up and coming industries and try to get involved in them early. Some industries Cowen has jumped on recently include cannabis, crypto-currency, and electric vehicles. Their full service capabilities allow analysts to decide between IB, Equity Capital Markets, and Debt Capital Markets teams, while the investment bankers have a generalist program. Firm culture at Cowen is predicated on honesty, open communication, and willingness to share. This starts at the top, as the CEO has made strides to create an uplifting community towards those with depression and anxiety."
    interviewsum.innerHTML = "Networking at Cowen is important, as it’s definitely easier to get an interview if you made a connection with an analyst. Plus, they care a lot about genuine interest in the firm. The first round interview is a simple screening call, where they ask a few technical questions, but mainly want to get a sense of the candidate. This is followed by a 3 interview super day with minimal technicals as well."
    emailformat.innerHTML = "first.last@cowen.com (ie. john.smith@cowen.com)"
    banklogo.src = "../images/banklogos/cowen.jpg"
}
const creditsuisse_button = document.querySelector('#creditsuisse')
creditsuisse_button.onclick = () =>{
    bankname.innerHTML = "Credit Suisse"
    writeup.innerHTML = "Credit Suisse is a well known, full service, bulge-bracket investment bank. Recently, the company has been in the news as they suffered billions of dollars in losses over the past couple years. However, the firm has been working hard with many internal changes to fight back and turn the corner. Though the firm has had its struggles, CS remains a best-in-class name for helping advance young finance careers into areas such as PE and VC. The firm has lean deal teams across the board, which is rare out of a bulge-bracket. Plus, the culture is known as extremely collegiate, representing a strong company environment."
    interviewsum.innerHTML = "CS recruits through 2 programs. First is their traditional IB program, and the second is directly into their Financial Institutions Group (FIG). These 2 programs have two separate applications, and you should network intentionally with people inside/outside the FIG group based on which path you want to take. Networking is important at CS to have a chance at getting an interview. CS also makes applicants take online tests as part of their application to test cognitive abilities in certain areas. In terms of interviews, typically CS has 2 first round interviews and a super day consisting of 2 more. Generally, these are heavily based on behaviorals. However, be prepared to answer basic questions from the guides."
    emailformat.innerHTML = "first.last@credit-suisse.com (ie. john.smith@credit-suisse.com)"
    banklogo.src = "../images/banklogos/creditsuisse.png"
}
const evercore_button = document.querySelector('#evercore')
evercore_button.onclick = () =>{
    bankname.innerHTML = "Evercore"
    writeup.innerHTML = "Evercore is considered one of the most prestigious boutique banks. While they are recognized as a boutique shop based on their size, they don’t shy away from the biggest of deals. They pride themselves on “punching above their weight,” representing the ambition within the firm. Because they have the advisory capabilities of a bulge-bracket firm without any biased motivation, they are able to provide M&A advisory for some of the biggest deals on the street. Some of their strongest groups include technology (they separate their TMT between the three) and healthcare. While Evercore is known for their M&A advisory, their restructuring and capital markets advisory teams have also been growing recently."
    interviewsum.innerHTML = "The recruiting cycle at Evercore is known to be one of the most technical processes. The process begins with a first round interview, followed up by a second round shortly after if you pass the first. In these interviews, oftentimes Evercore will ask one or two behavioral questions and follow those with only technicals for the rest of the time. Next, the super day is often 4 interviews with more of a mix of behaviorals and technicals. However, the technicals are often more difficult, advanced questions. While networking is important at Evercore, many candidates have gotten interviews with only one or two calls, and many candidates haven’t gotten interviews with 2+ calls. Evercore is most definitely a quality over quantity type of firm, as analysts are extremely busy and it’s difficult to get more than one or two on the phone with you. When you have the opportunity to network with Evercore, take advantage of it."
    emailformat.innerHTML = "first.last@evercore.com (ie. john.smith@evercore.com)"
    banklogo.src = "../images/banklogos/evercore.png"
}
const financo_button = document.querySelector('#financo')
financo_button.onclick = () =>{
    bankname.innerHTML = "Financo"
    writeup.innerHTML = "Financo is a small firm, but extremely strong in the areas in which it operates. The firm has some of the top MDs on the street in the home goods, fashion, and beauty products industries. Because of this, they thrive in these niche segments. In 2021, they integrated with Raymond James, adding full service capabilities to their arsenal. The firm is made up of approximately 100 bankers, which is extremely small for any investment bank. However, their experience and expertise in retail and merchandise provides clients with the support they need to be successful. As one can imagine, the deal teams at Financo are super lean, making the analyst experience extremely hands on."
    interviewsum.innerHTML = "Financo’s small analyst class size makes their recruiting process difficult. It is important to network if Financo comes to your campus. The first round interview is typically both behaviorals and basic technicals. The super day, however, is known to be extremely technical, with one of the interviews being 60 minutes straight of technical questions. Another super day interview is more behavioral, with industry specific questions about Financo’s areas of operation. In order to land the job, you need to effectively show why you want to be at Financo specifically."
    emailformat.innerHTML = "firstinitiallastname@financo.com (ie. jsmith@financo.com)"
    banklogo.src = "../images/banklogos/financo.png"
}
const goldman_button = document.querySelector('#goldmansachs')
goldman_button.onclick = () =>{
    bankname.innerHTML = "Goldman Sachs"
    writeup.innerHTML = "Goldman Sachs is regarded as the top investment bank. It is the most well known investment bank, and is extremely connected all across the finance world. They are advisors on a majority of the largest deals that come across Wall Street, and they are a full service bank. GS is well known for its apprenticeship programs, with upper level MDs and VPs willing to help interns and analysts learn and grow. The firm specializes in TMT, but is also strong within every sector in which it operates. Other banks often look towards GS to see what moves they are making, which is a huge indicator of the firm’s prestige and power."
    interviewsum.innerHTML =
    emailformat.innerHTML = "first.last@gs.com (ie. john.smith@gs.com)"
    banklogo.src = "../images/banklogos/goldman.png"
}
const greenhill_button = document.querySelector('#greenhill')
greenhill_button.onclick = () =>{
    bankname.innerHTML = "Greenhill"
    writeup.innerHTML = "Greenhill was one of the first boutique banks. The firm is made up of around 300 people, which is pretty small, even for a boutique. They offer M&A and restructuring services to their clients, and are known for their strategic advisory. The firm has no industry groups, meaning analysts get to spend their time across sectors, but they do section themselves into product groups: M&A and restructuring. Deal teams are extremely lean at Greenhill, often consisting of just one banker from each position: analyst, associate, VP, MD. These lean teams allow for great client and upper level exposure for analysts."
    interviewsum.innerHTML = "Greenhill is known for a smooth, transparent recruiting process. Because the firm is so small, it’s important to get to know the bankers who are alumni of your school. Their analysts are also known for typically being easier to reach than other firms. The first round interview is followed by a super day of 4 interviews, which are known to be technically challenging. The super day interviews are often conducted by upper level bankers."
    emailformat.innerHTML = "first.last@greenhill.com (ie. john.smith@greenhill.com)"
    banklogo.src = "../images/banklogos/greenhill.jpg"
}
const guggenheim_button = document.querySelector('#guggenheim')
guggenheim_button.onclick = () =>{
    bankname.innerHTML = "Guggenheim"
    writeup.innerHTML = "Guggenheim prides themselves on being a hardworking, driven firm with a collaborative company culture. The firm pushes to “punch above their weight” and are starting to advise on more of the larger deals on the street. Plus, MDs are known to have an entrepreneurial mindset, finding creative ways to solve problems within their strategic advisory services. The firm is also known to have a strong TMT group. They offer a generalist program for the internship before entering into an industry or product group full time."
    interviewsum.innerHTML = "Networking is extremely important at Guggenheim. Prioritize getting on the phone with bankers from the firm to give yourself the best chance of getting an interview. Oftentimes the interviews are heavy on behaviorals, with occasional technicals from the guides. They care most about figuring out who you are, as culture is an extremely important part of their firm."
    emailformat.innerHTML = "first.last@guggenheimpartners.com (ie. john.smith@guggenheimpartners.com)"
    banklogo.src = "../images/banklogos/guggenheim.jpg"
}
const houlihan_button = document.querySelector('#houlihanlokey')
houlihan_button.onclick = () =>{
    bankname.innerHTML = "Houlihan Lokey"
    writeup.innerHTML = "Houlihan Lokey is known for their strong middle-market M&A and restructuring advisory services. The firm is very decentralized compared to other banks, with similar sized offices across the US and the world. They are an extremely successful global firm, ranked highly in terms of global M&A transactions advised on each year. The analyst program at Houlihan Lokey lasts for 3 years rather than 2, as well as their associate program. The firm prides itself on internal upward movement, as through their program, it is possible for bankers to become an MD after just 15 years at the firm."
    interviewsum.innerHTML = "The recruiting process at Houlihan Lokey is known to be more intense than other firms. Most of the time, there are 2 networking phone call screenings, and then 1 or 2 more interviews before a super day. The screenings are just slightly more important networking calls, however Houlihan is known to get extremely technical during their interviews. Especially if recruiting for the restructuring group, expect a technical process. The super day includes 6 interviews total. Five of which are behavioral, allowing bankers of all positions to learn more about you, while one is straight technical."
    emailformat.innerHTML = "firstinitiallastname@hl.com (ie. jsmith@hl.com)"
    banklogo.src = "../images/banklogos/houlihan.png"
}
const jefferies_button = document.querySelector('#jefferies')
jefferies_button.onclick = () =>{
    bankname.innerHTML = "Jefferies"
    writeup.innerHTML = "Jefferies is a middle market firm. Their analysts are often known to be motivated, hardworking, and excited about the work that they do. Jefferies is known for having a “work hard, play hard” company culture, as many of their analysts have outgoing, fun personalities, but they know how to get their work done. Jefferies is growing and pushing to get into the mix with larger bulge-bracket deals. They specialize in healthcare, while also having a strong presence in tech. These two groups are known to be highly sought after by incoming analysts because they do their M&A work in house, whereas other groups at the firm send M&A work to the M&A team."
    interviewsum.innerHTML = "Jefferies recruiting process is networking heavy, as the successful candidates who receive offers almost always network with 3+ bankers. There are typically 1-2 rounds of interviews depending on the school, with both behavioral and technical questions asked. Interviewers look for interpersonal skills, along with clear understanding of the concepts behind the BIWS guides."
    emailformat.innerHTML = "firstinitiallastname@jefferies.com (ie. jsmith@jefferies.com)"
    banklogo.src = "../images/banklogos/jefferies.jpg"
}
const jpmorgan_button = document.querySelector('#jpmorgan')
jpmorgan_button.onclick = () =>{
    bankname.innerHTML = "JP Morgan"
    writeup.innerHTML = "JP Morgan is considered one of the top 3 firms across the board. JPM has a rich history, being one of the first firms to come about in America. Since its inception, JPM has developed strongholds in just about every area of the finance industry, which is why the firm has developed such prestige. The fact that the firm has such a large balance sheet, meaning they can loan capital to companies, creates a broadness of strong opportunities within the firm: from IB to DCM, ECM, and S&T. Having all of these top-notch programs hosted within the walls of JPM is a huge selling point for incoming finance students. JPM also prides itself on upward internal mobility, as many analysts and associates rise through the ranks to VPs and MDs."
    interviewsum.innerHTML = "JPM has a similar recruiting process to the other top banks. The process starts with a HireVue, and is followed by a 3 interview superday. Superdays are often technical, more so than you would expect out of a bulge-bracket bank. If JPM doesn’t visit your school, be sure to network well to help you land an interview."
    emailformat.innerHTML = "first.last@jpmorgan.com (ie. john.smith@jpmorgan.com)"
    banklogo.src = "../images/banklogos/jpm.png"
}
const lazard_button = document.querySelector('#lazard')
lazard_button.onclick = () =>{
    bankname.innerHTML = "Lazard"
    writeup.innerHTML = "Lazard is a top tier boutique firm. They can be described as a white shoe, old school firm, with a long history of being an extremely intelligent and trustworthy advisor. They are the largest independent bank, working mainly on middle-market deals, and have a strong asset management arm in addition to their advisory services. In terms of culture, Lazard is known to have a collegiate work environment, with analyst class representation from Ivys, Duke, Vanderbilt, Notre Dame, and many Big 10 schools."
    interviewsum.innerHTML = "The recruiting process for Lazard is pretty typical. For certain target schools, they come to campus for coffee chats, and it is important to sign up for one to demonstrate interest. Besides that, networking isn’t known to be extremely important at Lazard, however as always, the more calls you can get in the better. The first round interview is typically split between behaviorals and technicals. The first half is more conversational, getting to know you and your resume, while the technical side often comes straight from the guides. The super day is 3 interviews with high level bankers, allowing them to get a better sense of your personality and whether or not you’d be a good fit at the firm, often with no technical questions asked."
    emailformat.innerHTML = "first.last@lazard.com (ie. john.smith@lazard.com)"
    banklogo.src = "../images/banklogos/lazard.jpg"
}
const macquarie_button = document.querySelector('#macquarie')
macquarie_button.onclick = () =>{
    bankname.innerHTML = "Macquarie"
    writeup.innerHTML = "Macquarie is a global bank. They are the largest firm in Australia and have a strong middle market presence in the United States. The firm specializes in their software and services groups, while also having a large leveraged finance team on the product side. Work culture at Macquarie is a huge staple to the company, bringing the Australian norm of a more relaxed workplace into the US. The relationship between their Australian and American offices is incredibly strong, including location flexibility for all workers."
    interviewsum.innerHTML = "Macquarie has a relatively standard recruiting process. Networking with a couple analysts is important and will help push you into an interview. First round interviews are typically split between technical and behavioral questions, while the super days have much more of a focus on getting to know the candidate. Macquaries interviews are known for being more like conversations than Q and As, which is representative of the genuine and relaxed firm culture."
    emailformat.innerHTML = "first.last@macquarie.com (ie. john.smith@macquarie.com)"
    banklogo.src = "../images/banklogos/macquarie.jpg"
}
const mizuho_button = document.querySelector('#mizuho')
mizuho_button.onclick = () =>{
    bankname.innerHTML = "Mizuho"
    writeup.innerHTML = "Mizuho is an international, full service, bulge-bracket firm. Headquartered in Tokyo, Mizuho has 65k employees and $2 trillion under management, making it one of the largest firms across the world. The firm’s strengths on the product side is their debt capital markets team, while also having a strong ECM and M&A group. On the industry side, TMT is their biggest group and it's where they generate the most revenue. They stress the idea of “One Mizuho,” representing the concept that all different products and industries work together on deals to deliver the best to clients."
    interviewsum.innerHTML = "Networking is not incredibly important at Mizuho, as many candidates receive interviews without more than a call or two, but having a solid network can definitely help land you an interview. Mizuho typically has two first round interviews which are a mix of technical and behavioral, with a big emphasis on resume questions and current events. If you get past the first round, they have rolling super days throughout the following weeks, consisting of 3 interviews with higher level bankers. These interviews were more behavioral than the first rounds."
    emailformat.innerHTML = "first.last@mizuhogroup.com (ie. john.smith@mizuhogroup.com)"
    banklogo.src = "../images/banklogos/mizuho.png"
}
const mk_button = document.querySelector('#mkleinco')
mk_button.onclick = () =>{
    bankname.innerHTML = "M. Klein & Co"
    writeup.innerHTML = "M. Klein & Company is an extremely interesting investment bank. The firm prides itself on secrecy, as they have no full website, they don’t publicize deals, and it is very difficult to contact their bankers. Michael Klein is known for his success and status in the banking industry, which is a main reason for the firm's strong reputation. Many of the MDs at the firm are close friends to Michael as well. The bank is extremely small in terms of people, and analysts are known to be exceptionally smart and technically sound. The firm is also generalist throughout. They work on deals across the world, with a hot spot in Saudi Arabia, and they perform some SPAC work in addition to traditional IB."
    interviewsum.innerHTML = "Because the firm is so small, it is super important to network well with the couple alumni who graduated from your school. In the first round interview, bankers try to decipher which candidates have a deep interest and understanding of the TMT sector, often asking about current events and trends in the industry, in addition to standard technical questions. The Raine super day, much like the first round, is a test of TMT passion. Most of the questions are about their portfolio companies and industry trends. Often this super day has very little typical technicals, and surprisingly few behaviorals, with a majority of the questions about TMT related concepts."
    emailformat.innerHTML = "first.last@mkleinandcompany.com (ie. john.smith@mkleinandcompany.com)"
    banklogo.src = "../images/banklogos/mklein.png"
}
const morganstanley_button = document.querySelector('#morganstanley')
morganstanley_button.onclick = () =>{
    bankname.innerHTML = "Morgan Stanley"
    writeup.innerHTML = "Morgan Stanley is considered one of the big 3 investment banks. This full service, bulge-bracket firm is known for being a leader across the banking world, with arguably the most prestigious M&A advisory department. MS doesn’t have as big of a balance sheet as GS or JPM, which contributes to their top-notch, unbiased, M&A advisory efforts. In terms of industry groups, MS is specifically strong in TMT. Many attribute the firm’s long history of success to their company values and how they have stuck to them throughout the years. These values are, “Do the right thing, put clients first, lead with exceptional ideas, commit to diversity & inclusion, and give back.” MS truly puts these values first, and they talk about them religiously throughout the recruiting process."
    interviewsum.innerHTML = "Morgan Stanley’s recruiting process begins with a Hirevue. It typically just asks some behavioral questions to get to know you better. It’s important to stand out during this Hirevue, or to get your foot in the door through networking, which can be difficult at MS. The following round is a phone call interview, which is mainly behavioral with some technicals and market sizing questions as well. Finally, the super day is typically 3 interviews with upper level bankers, with some easier technicals, and much more behaviorals. MS puts a huge emphasis on seeing if their candidates fit the personable culture of the firm, coupled with the ability to work well under pressure."
    emailformat.innerHTML = "first.last@morganstanley.com (ie. john.smith@morganstanley.com)"
    banklogo.src = "../images/banklogos/morganstanley.png"
}
const perellaweinberg_button = document.querySelector('#perellaweinberg')
perellaweinberg_button.onclick = () =>{
    bankname.innerHTML = "Perella Weinberg"
    writeup.innerHTML = "PWP, or Perella Weinberg Partners, is a top tier boutique investment bank. The firm is known to have great deal flow and smart analysts, with a big emphasis on company culture. They care more about work-life balance at PWP than many of the other firms on the street, and it’s known that they won’t work you to the bone. In terms of M&A advisory, PWP specializes in healthcare, with strong groups in consumer retail and technology as well. They want to hire analysts who are all-in on the firm, as they want people who are looking to stay and make a difference on the firm’s young history."
    interviewsum.innerHTML = "The recruiting process at PWP does not require a lot of preliminary networking. However, try your best to set up phone calls with analysts to get your foot in the door. Because of their strong emphasis on company culture, their interviews are almost exclusively behaviorals. They follow the typical first round, then super day recruitment timeline. They want to understand why you want to be at the firm, so only candidates with genuine interest in PWP succeed in these rounds. The superday ends with one technical round, ensuring that candidates took the time to study and learn the guides."
    emailformat.innerHTML = "firstinitiallastname@pwpartners.com (ie. jsmith@pwpartners.com)"
    banklogo.src = "../images/banklogos/pwp.jpg"
}
const pjt_button = document.querySelector('#pjt')
pjt_button.onclick = () =>{
    bankname.innerHTML = "PJT"
    writeup.innerHTML = "PJT Partners is an elite boutique bank, focused on strategic advisory. Although the firm is incredibly young, created in 2015, PJT takes on some of the largest global M&A deals, while maintaining the intimacy of a small boutique firm. PJT is known to have passionate, driven bankers who reflect the firm’s young and entrepreneurial spirit. The firm is generalist throughout both the internship program and full time."
    interviewsum.innerHTML = "It is important to network early and often with PJT. Their analysts are known to be more difficult to reach than other firms, so try to reach out to a variety of analysts. The first round interview typically consists of behaviorals and applied technicals. The super day is typically 4 interviews, two of each type, with technicals known to be more conceptual and M&A focused than the typical firm."
    emailformat.innerHTML = "first.last@pjtpartners.com (ie. john.smith@pjtpartners.com)"
    banklogo.src = "../images/banklogos/pjt.png"
}

const raine_button = document.querySelector('#raine')
raine_button.onclick = () =>{
    bankname.innerHTML = "Raine"
    writeup.innerHTML = "Raine is a boutique investment bank that focuses solely on the TMT sector. They work on some of the coolest deals on the street, ranging from the sale of sports teams to the purchasing of large-scale media companies. In addition to their advisory services, they manage a TMT focused investment fund, doing work in growth equity, venture capital and public markets, with more than $4 billion in current assets under management. Analysts spend their time working on a mix of advisory and investments daily. The analyst classes at Raine are extremely small, ranging from 8-12 every year, making the recruiting cycle extremely competitive."
    interviewsum.innerHTML = "Because the firm is so small, it is super important to network well with the couple alumni who graduated from your school. In the first round interview, bankers try to decipher which candidates have a deep interest and understanding of the TMT sector, often asking about current events and trends in the industry, in addition to standard technical questions. The Raine super day, much like the first round, is a test of TMT passion. Most of the questions are about their portfolio companies and industry trends. Often this super day has very little typical technicals, and surprisingly few behaviorals, with a majority of the questions about TMT related concepts."
    emailformat.innerHTML = "firstinitiallastname@raine.com (ie. jsmith@raine.com)"
    banklogo.src = "../images/banklogos/raine.png"
}
const rbc_button = document.querySelector('#rbc')
rbc_button.onclick = () =>{
    bankname.innerHTML = "RBC"
    writeup.innerHTML = "RBC is a growing, full service investment bank. It’s often referred to as an “inbetween bank,” with a mix of bulge-bracket and middle market tendencies. Their strongest product is their M&A advisory service, however they also have a top leveraged finance team and the capabilities to take on large financings. RBC has always had a strong presence in Canada, but they’ve really focused on expanding their hold on the US market. Over the past 10 years, the firm has grown tremendously, and they have increased their market share by taking on more deal volume. They thrive in more of the gritty industry groups, such as industrials, power and utilities, and FIG, rather than more flashy ones like TMT and healthcare. RBC is also known for having a collaborative, collegiate company culture."
    interviewsum.innerHTML = "It’s important to network with your school’s representatives to get your foot in the door at RBC. The first round interview typically sticks to a mixture of experience based questions and basic technicals. The super day is more of the same, consisting of 3 interviews with a mix of behavioral and technicals, with technicals being noted as less intense than the typical firm."
    emailformat.innerHTML = "first.last@rbccm.com (ie. john.smith@rbccm.com)"
    banklogo.src = "../images/banklogos/rbc.png"
}
const solomon_button = document.querySelector('#solomonpartners')
solomon_button.onclick = () =>{
    bankname.innerHTML = "Solomon Partners"
    writeup.innerHTML = "Solomon Partners is a middle-market firm known for their consumer retail and grocery teams. The firm was founded when a vice chairman at Lehman Brothers, Peter J Solomon, left to create his own investment bank in 1989. The firm has recently made a push into the TMT industry, but their top group remains consumer retail. Their main focus is in M&A, with some debt and equity advisory products as well. Company culture at Solomon is highly regarded, with many analysts attesting to their love for their company and job."
    interviewsum.innerHTML = "The recruiting process at Solomon Partners occurs on a rolling basis, which is different from most firms. The first round interviews are phone call screenings, which they use to determine super day invites. Because these phone call interviews are rolling, they have many waives of super days. Each super day has 4 interviews with two bankers each, consisting of both technical and behavioral questions. Questions are definitely more on the behavioral and qualitative side, with a few technicals asked within. Throughout the process, interviewers are often thought of as friendly, non condescending people. However, it is oftentimes difficult to network at Solomon (low response rates), so be sure to reach out to enough connections and alumni in hopes to get an interview."
    emailformat.innerHTML = "first.last@solomonpartners.com (ie. john.smith@solomonpartners.com)"
    banklogo.src = "../images/banklogos/solomon.jpg"
}
const ubs_button = document.querySelector('#ubs')
ubs_button.onclick = () =>{
    bankname.innerHTML = "UBS"
    writeup.innerHTML = "Founded and based in Switzerland, UBS is a full service, international investment bank. They are considered an “in-between bank” as they have some tendencies of both a middle market and bulge bracket firm. Their main products are M&A advisory and leveraged finance, although they have strong asset and wealth management arms as well. Despite their large size, the firm stresses that they have lean deal teams to give analysts great hands-on experience. They care a lot about the interconnectivity of their groups, which is representative of the supportive firm culture."
    interviewsum.innerHTML = "No matter what school you go to, you definitely should try to network well at UBS to advance in their recruiting process. The firm’s process typically starts with a HireVue due to the large number of applicants they receive. Then, some candidates get through to a 3 interview super day which consists of a mix of behaviorals and technicals. The technicals are noted to be simple questions from the guides."
    emailformat.innerHTML = "first.last@ubs.com (ie. john.smith@ubs.com)"
    banklogo.src = "../images/banklogos/ubs.png"
}
const william_button = document.querySelector('#williamblair')
william_button.onclick = () =>{
    bankname.innerHTML = "William Blair"
    writeup.innerHTML = "William Blair is a full service, middle market firm. The internship program only recruits candidates into the Chicago office, which is the center of their banking operations, although they have offices across the world. William Blair is known for their strength in the biotech sector, as well as their extremely lean deal teams. The internship is generalist, but as you take the step into full time, you network into industry groups. William Blair is also known for great company culture, representing a collegiate atmosphere and midwestern values."
    interviewsum.innerHTML = "William Blair has a pretty typical recruiting process, besides the fact that they only recruit into their Chicago office. Networking isn’t overly important, as many candidates have received interviews with as little as one phone call. The first round interview is typically technical, but many of the questions are straightforward and from the guides. The final round is typically a 5 interview super day, with minimal technicals asked the whole day. They mainly want to get a feel for the candidate’s fit after they get past the first round."
    emailformat.innerHTML = "firstinitiallastname@williamblair.com (ie. jsmith@williamblair.com)"
    banklogo.src = "../images/banklogos/williamblair.png"
}