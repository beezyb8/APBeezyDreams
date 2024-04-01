const firmname = document.querySelector('#firm_name')
const writeup = document.querySelector('#writeup')
const interviewsum = document.querySelector('#interviewsum')
const emailformat = document.querySelector('#emailex')
const firmlogo = document.querySelector(".firm_logo")
const writtencont = document.querySelector(".writtencont")
const notescont = document.querySelector(".notescont")
const contactcont = document.querySelector(".contactcont")
const homepage = document.querySelector(".homepage")
const appcont = document.querySelector(".app_cont")
const applink_btn = document.querySelector(".applink_modal")
const abus_hide = document.querySelector(".abus_hide")
const disc_hide = document.querySelector(".disclaimer_cont")
const all_switches = document.querySelectorAll(".switch")

const info_cont = document.querySelector(".info_inner_container")


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

var firmidlistarray = ['mckinsey','bostonconsultinggroup','deloitte','kpmg','baincompany','pwc','strategy','ey','eyp','fticonsulting','zs','boozallen','oliverwyman','clearviewhcp','accenture','westmonroe','lek','treacycompany','rolandberger','cornerstone'] 

// Manipulate this below!!!
// Create an OG PAGE with elements explaining how to use this page!


$(document)
.on('click', ".switch", function(event) {
    scroll(0,0)
    var thisid = $(this).attr("id");
    var thistitle = $(this).attr("value");
    if(!firmidlistarray.includes(thisid)){
        firmname.innerHTML = thistitle;
        writtencont.style.display = "none";
        appcont.style.display = "none";
        applink_btn.style.display = "block";
        firmlogo.style.display = "none";
        notescont.style.display = "block";
        contactcont.style.display = "block";
        homepage.style.display = "none";
        abus_hide.style.display = "none";
        disc_hide.style.display = "none";
        info_cont.classList.toggle("slideup_info_cont");
        setTimeout(function() {
            info_cont.classList.toggle("slideup_info_cont");
        }, 1200);
    } else{
        writtencont.style.display = "block";
        firmlogo.style.display = "block";
        notescont.style.display = "block";
        contactcont.style.display = "block";
        appcont.style.display = "none";
        applink_btn.style.display = "block";
        homepage.style.display = "none";
        abus_hide.style.display = "none";
        disc_hide.style.display = "none";
        info_cont.classList.toggle("slideup_info_cont");
        setTimeout(function() {
            info_cont.classList.toggle("slideup_info_cont");
        }, 1200);
    }
    all_switches.forEach(function(dat){
        var firm_title_for_comp = firmname.innerHTML;
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
const mckinsey_button = document.querySelector('#mckinsey')
mckinsey_button.onclick = () =>{
    firmname.innerHTML = "McKinsey"
    writeup.innerHTML = "McKinsey is the oldest and largest of the Big 3 consulting firms, with a prestigous and respected reputation. The firm is known for strategy and management consulting, and has a strong presence in all major industries, including the public sector. The work culture at McKinsey is generally known to be more intense than the typical firm, with very hard working analysts. However, many analysts have attested to having friendly coworkers who cultivate a collaborative and entrepreneurial spirit throughout the firm. Another thing about McKinsey is that they recruit students from all types of majors and schools, not just traditional business backgrounds, which adds to their diverse workforce. Although there are many McKinsey offices across the world, most are known for conducting similar strategy practices, with NYC being their biggest office. Candidates apply to the internship program as a generalist, and analysts typically specialize after a year or two on the job, with the current trend being earlier specialization."
    interviewsum.innerHTML = "After submitting an application, all candidates must complete the McKinsey Problem Solving Test: a simulation-style video game where the firm evaluates candidates’s analytical and decision making skills. Interviews at McKinsey consist of behaviorals and casing, with one interview most notably being a PEI, or personal experience interview. This interview is explained in detail on the McKinsey website, and concerns the candidate telling a single story about a personal experience of theirs. Moreover, the casing interview style at McKinsey is interviewer-led, instead of the more frequently conducted interviewee-led casings at other firms."
    emailformat.innerHTML = "[first]_[last]@mckinsey.com (ie. john_smith@mckinsey.com)"
    firmlogo.src = "images/firmlogos/mckinsey.png"
}

const bostonconsultinggroup_button = document.querySelector('#bostonconsultinggroup')
bostonconsultinggroup_button.onclick = () =>{
    firmname.innerHTML = "Boston Consulting Group"
    writeup.innerHTML = "Boston Consulting Group is the second oldest member of the Big 3. Associated with high levels of prestige, the firm works mainly in strategy and management consulting for a massive array of clients. BCG prides itself on a positive work culture with self-driven analysts who are incredibly smart, diverse, and hungry to learn. The firm currently has offices in 22 cities across the country, with each office covering a wide range of industries and clientele. BCG also prides itself on where its analysts go after their time at the firm, with a history of high acceptance rates to elite MBA programs. All interns and starting associates are onboarded as generalists, so the staffing director will place workers into different industries and functions throughout their first year. After that, associates can start networking themselves onto certain projects."
    interviewsum.innerHTML = "The BCG recruiting process is segmented into 3 key phases: applications, 1st round interviews, and final round interviews. The application has 3 sets of deadlines; be sure to apply when you feel ready for interviews. Within the application, you must submit a resume, cover letter, and complete the BCG Pymetrics Test which is a set of mini games that takes approximately 30 minutes to complete. There is no need to prepare for the test. The first round interview consists of an online case and 30 minutes of behaviorals, while the final round consists of two separate 45 minute interviews with a case and some behaviorals in each. Another thing to note is that after being extended a final round interview, an associate from the firm may reach out to conduct a practice case, and your performance may be tracked. However, it’s still recommended to take the practice case and use it as another chance to network and have your questions answered."
    emailformat.innerHTML = "[last].[first]@bcg.com (ie. smith.john@bcg.com)"
    firmlogo.src = "images/firmlogos/bcg.png"
}

const deloitte_button = document.querySelector('#deloitte')
deloitte_button.onclick = () =>{
    firmname.innerHTML = "Deloitte"
    writeup.innerHTML = "Deloitte is the largest of the Big 4 firms. They provide many different services to their clients, including accounting, consulting, tax and audit, and cyber risk/security. They are a leader throughout the consulting industry, and are strong in almost all industries in which they operate, including financial services, TMT, energy, IT operations, and data analytics. Deloittes company culture is known to be relatively intense due to the high standard that the firm works towards, however employees are known to be very friendly and social. They have a heavy emphasis on building your own network within the firm, and there are many opportunities to foster these connections through social events, training programs, and internal initiatives. As a Big 4 firm, Deloitte has offices all across the country and world, with its main US location in NYC."
    interviewsum.innerHTML = "Deloitte cares deeply about gaining personable interns and analysts, as they are known for having an outgoing workforce to create relationships with clients. For this reason, networking and behavioral interviews are extremely important at the firm. The interview process is typically two rounds, with a mix of behavioral and casing interviews throughout the first and second rounds (both interviewer-led and interviewee-led cases). The firm offers practice cases on their website which give candidates an idea of what the real ones will be like. The internship program itself is a generalist program, meaning that interns are rotational throughout the summer. When joining the firm full time, consultants are placed within a temporary speciality based on their interests. However, there is a lot of flexibility with project assignment, and consultants definitely join projects outside of their speciality to explore other areas. After two years of working as an analyst, consultants formally specialize."
    emailformat.innerHTML = "[first_initial][last]@deliotte.com (ie. jsmith@deloitte.com)"
    firmlogo.src = "images/firmlogos/deloitte.png"
}

// EMAIL FORMATS
const kpmg_button = document.querySelector('#kpmg')
kpmg_button.onclick = () =>{
    firmname.innerHTML = "KPMG"
    writeup.innerHTML = "KPMG is the smallest of the Big 4 firms, yet they still possess a well known name across the world. The main services that the company offers are in offering audit, tax, and advisory. The firm is generally known for having a friendly, supportive culture and a good work/life balance, making it a popular place for young professionals to start and develop their careers. Their employees come from all types of schools, majors, and backgrounds, making it an extremely diverse place. By the same token, KPMG is also known for not being as internally competitive as its Big 4 counterparts. Additionally, candidates apply for a specific department for their summer internship, as it is not a generalist program."
    interviewsum.innerHTML = "In terms of recruiting, KPMG typically recruits students earlier than other firms, starting interviews in early September in 2022. One thing to note is that the interviews are only behavioral and situational. Instead of casing, the firm wants to gain a deeper understanding of who the candidate is, and whether or not they would be a good fit for the firm. The interview process typically consists of two interviews, the first being behavioral, and the second being situational (just another form of behavioral). Networking is definitely important towards landing an interview at the firm."
    emailformat.innerHTML = "[first_initial][last]@kpmg.com (ie. jsmith@kpmg.com) or [first][last]@kpmg.com (ie. johnsmith@kpmg.com)"
    firmlogo.src = "images/firmlogos/kpmg.png"
}
const bain_button = document.querySelector('#baincompany')
bain_button.onclick = () =>{
    firmname.innerHTML = "Bain & Company"
    writeup.innerHTML = "Bain is a top tier consulting firm recognized for their entrepreneurial spirit and results-oriented approach. They are known to have an exciting company environment, with consultants who are bright, capable, go-getters. While Bain is the newest of the Big 3 consulting firms, they are known to be the strongest in strategy focused projects, which is their bread and butter. In respect to their Big 3 counterparts, they are also the smallest firm, which contributes to their tight-knit culture. Another difference between Bain and its competitors is that Bain has an at home staffing model, meaning teams are composed of people from the same office. This allows associate consultants to get integrated more easily into the office and get to know the colleagues on their team better."
    interviewsum.innerHTML = "The recruiting process at Bain is different from the typical consulting firm, as they do not have traditional behavioral interviews. Instead, they will try to get to know the interviewee through casing interviews, leaving some time at the end of each for a few questions. Typically there are two rounds of interviews, with two cases in the first round and three cases in the second. One thing to note is that candidates apply to the firm as a generalist. After their internship, they will work within different industries until they begin to specialize after a year or two on the job."
    emailformat.innerHTML = "[first].[last]@bain.com (ie. john.smith@bain.com)"
    firmlogo.src = "images/firmlogos/bain.png"
}
const pwc_button = document.querySelector('#pwc')
pwc_button.onclick = () =>{
    firmname.innerHTML = "PwC"
    writeup.innerHTML = "PricewaterhouseCoopers (PwC) is one of the world’s largest professional service networks. As a household name, PwC has been providing quality services for its clientele for years, helping them to navigate complex business challenges. The firm is best known for providing audit and assurance, tax, and consulting services to many of the world’s largest companies. PwC has consistently operated within main industries such as technology, energy, healthcare, financial services, and consumer retail, while recently focusing more in other areas such as cybersecurity, sustainability, and digital transformation. PwC is also known to have more of a sociable and relaxed culture than some of the other top firms, where everyone can share their ideas openly. The firm puts a heavy emphasis on collaboration, teamwork, and allowing creativity."
    interviewsum.innerHTML = "Throughout the recruiting process, PwC focuses heavily on networking. Being able to hold a conversation with an employee and showing your interest in a specific role at the firm is of utmost importance when trying to land an interview. PwC hosts two interviews as a part of its recruiting process. Each interview consists of some behavioral questions and a case. Many attest to these interviews being extremely conversational. One thing to note about the internship program at PWC is that after interviews, incoming interns are placed into a specialization that best suits their resume and interests. Interns aren’t generalists, but group placement is known to be flexible."
    emailformat.innerHTML = "[first].[last]@pwc.com (ie. john.smith@pwc.com)"
    firmlogo.src = "images/firmlogos/pwc.png"
}
const strategy_button = document.querySelector('#strategy')
strategy_button.onclick = () =>{
    firmname.innerHTML = "Strategy&"
    writeup.innerHTML = "Strategy& (formerly Booz & Company) became part of PwC in 2014. The acquisition combined the strategic expertise of Booz & Company with the technology and scale of PwC. The firm works across many different industries, and operates in several different segments. These segments include: 1) strategy consulting, 2) cloud & digital strategy, 3) customer transformation, 4) deals strategy, 5) enterprise, strategy, & value, 6) health transformation, 7) operations transformation, and 8) private equity value creation. Concerning internships, candidates apply directly into one of these segments, as there is no generalist program. Culture at Strategy& is known to be more relaxed than other top firms. Analysts have a lot of flexibility when moving from one project to another, and are given a lot of guidance from mentors. Many have said its firm culture is similar to that of EYP."
    interviewsum.innerHTML = "Networking is important at Strategy&, similar to its parent company, PwC. If the firm comes to your campus, sign up for coffee chats, and if they don’t, be sure to network with a couple of your school’s alumni who work there. The interview process consists of two interviews, both containing behavioral questions and a case. While each recruiting process will be different depending on the segment you are applying for, their interviews are known to be more quantitative, as they often test market sizing abilities."
    emailformat.innerHTML = "[first].[last]@pwc.com (ie. john.smith@pwc.com)"
    firmlogo.src = "images/firmlogos/strat.png"
}

const ey_button = document.querySelector('#ey')
ey_button.onclick = () =>{
    firmname.innerHTML = "EY"
    writeup.innerHTML = "Originating as an auditor and tax service firm, EY has developed into a strong, global management consulting firm with an extremely respected reputation. Over the past couple decades, the firm has established itself as a primary provider for consulting and transaction services as its capabilities, technology expertise, and workforce have expanded. While the firm has a solid reach across the technology, energy, and retail verticals, EY’s most prevalent industry coverage is within financial services, working with banks, insurance companies, and asset management firms. While the analysts at EY are extremely hard working, the culture is known to have a focus on community, which is partly why interviews tend to be more behavioral than other firms. As a Big 4 firm, they have offices located in many major cities across the country and world, with NYC being their biggest office. Due to their national reach, EY consultants from different offices often work with each other on projects. They also have a very flexible office reassignment policy."
    interviewsum.innerHTML = "EY offers many different internship programs across their company. For consulting internships, candidates can either apply to a specific team or a rotational program. Interviews for EY are known to be heavy on the behaviorals, with one simple case for business consulting. Typically the structure of the process is a first round behavioral, followed by a super day of two behaviorals and a case. Networking is of standard importance at the firm, but as always, make sure to reach out to your school’s alumni to get an edge in EY’s interview process."
    emailformat.innerHTML = "[first].[last]@ey.com (ie. john.smith@ey.com)"
    firmlogo.src = "images/firmlogos/ey.png"
}

const eyp_button = document.querySelector('#eyp')
eyp_button.onclick = () =>{
    firmname.innerHTML = "EYP"
    writeup.innerHTML = "Founded in 1991 by former Bain partners, and acquired by EY in 2014, EY-Parthenon was created to compete against the Big 3 in strategy and transactions consulting. EYP’s offerings can be split up into 4 divisions: corporate strategy, deal technology (Strategic Solutions Group), private equity, and deal management (Mergers & Acquisitions). The culture at EYP is known to be extremely diverse, with a work hard play hard type culture. There were 80 interns this past summer in the NYC office who became an extremely tight-knit group throughout the program, according to some of those interns themselves. Concerning their relation with the main EY branch, EYP is known to be pretty separate, with some crossover on certain projects."
    interviewsum.innerHTML = "Regarding recruitment, candidates can apply to two different programs: the CORE Rotational Program which includes project experience in the corporate strategy, PE, and deal management divisions, or straight into the deal technology division which more tech-focused candidates should apply to. In 2022, there was only one round of interviews for EYP, which was a super day in NYC. It consisted of 3 interviews: two cases and one behavioral. Networking is definitely important for landing a spot in the EYP summer program, as they host many events at their target schools. These include some invite-only events before they send out interview invitations."
    emailformat.innerHTML = "[first].[last]@parthenon.ey.com (ie. john.smith@parthenon.ey.com) or [first].[last]@ey.com (ie. john.smith@ey.com)"
    firmlogo.src = "images/firmlogos/eyp.png"
}
const fti_button = document.querySelector('#fticonsulting')
fti_button.onclick = () =>{
    firmname.innerHTML = "FTI Consulting"
    writeup.innerHTML = "FTI Consulting is a strong firm, most notably known for their top tier restructuring advisory division. Ten years ago, the company hired a new CEO and since then have made massive strides towards competing with the Big 3 and 4 firms. They have a very strong forensic and litigation consulting team, along with growing corporate finance consulting and transaction advisory teams. In terms of industry coverage, they are most known for their strengths in TMT and healthcare. The work culture at FTI is known to be extremely positive with a welcoming atmosphere. They have an open door policy for all levels of the company and tons of mentorship opportunities. In terms of locations, FTI has offices spread out across the US, with NYC being their biggest office and DC being their headquarters. There is also a strong presence in their west coast, Denver, and Texas offices."
    interviewsum.innerHTML = "When applying for the job, candidates apply into a certain team, but typically work across many functions so they get varied experience. The interview process is known to vary depending on the team you are applying for, but generally the firm hosts two rounds of interviews before hiring. The first round is typically behavioral, with the second often being a case. In behavioral interviews, the firm looks for candidates who are not just smart, but also interesting, and show why they want to join the specific team they are applying for."
    emailformat.innerHTML = "[first].[last]@fticonsulting.com (ie. john.smith@fticonsulting.com)"
    firmlogo.src = "images/firmlogos/fti.png"
}
const zs_button = document.querySelector('#zs')
zs_button.onclick = () =>{
    firmname.innerHTML = "ZS"
    writeup.innerHTML = "ZS is a top firm in healthcare, life sciences, and pharma consulting. However, they still have a deep expertise in many other industries, including financial services, consumer retail, private equity, travel & hospitality, and high-tech & telecommunications. In terms of their services, ZS specializes and focuses on top line revenue growth strategy, rather than cost cutting work. Regarding the company’s environment, ZS is a fast growing firm, upholding an entrepreneurial spirit. Because of this, the firm is known to be very collaborative, with consultants at all levels known to offer to help others and care about their coworkers' learning journeys."
    interviewsum.innerHTML = "The interview process at ZS is typically 3 rounds, consisting of a structured case interview, an unstructured case interview, and a behavioral interview. While the firm is definitely known for their work in healthcare and life sciences, no background in those industries is expected for new hires. In terms of placement, first year analysts are placed on a “discovery track” that lets them work on projects in various industries and spaces across the firm, both in healthcare and beyond. Later on, analysts ultimately declare an industry specialization for future staffing or can choose to remain in more of a generalist role."
    emailformat.innerHTML = "[first].[last]@zs.com (ie. john.smith@zs.com)"
    firmlogo.src = "images/firmlogos/zs.png"
}
const booz_button = document.querySelector('#boozallen')
booz_button.onclick = () =>{
    firmname.innerHTML = "Booz Allen"
    writeup.innerHTML = "Booz Allen Hamilton is the preeminent government strategy consulting firm, focusing almost exclusively on government projects at the local, state, and national level. They are a strategic partner for departments in just about every sector of government, including IT strategy, cybersecurity, health, aerospace, energy, and defense consulting. Because of this, many students with interests in both business and political science apply for Booz Allen’s internship. When it comes to culture, the firm is very collaborative and networking-oriented. For example, each week during their summer internship, time is blocked out exclusively for interns to network with different groups within the firm. Booz Allen’s collaborative environment can largely be attributed to the fact that almost everyone receives a return offer. This is because of the large investment the firm makes in each intern by providing them a “secret” government security clearance. Getting a security clearance at such a young age through an internship program is extremely rare, so candidates must be fairly certain that they want to work in this industry long term before accepting an offer."
    interviewsum.innerHTML = "The main internship program for Booz Allen, titled Summer Games, is a unique, ten week paid internship program that simulates a real-world startup accelerator. The interview process consists of a first round phone screen that asks classic behavioral questions, and is followed by a second round interview that also contains all behaviorals. One thing to note is that the firm takes notoriously long to announce offers. The internship program is generalist, while full time analysts specialize in a certain group based on the work they most enjoyed during the summer. Also, almost all interns are located in either the Washington, D.C. or McLean, VA offices. Applicants should definitely “pref” these locations if possible, as the Summer Games program works best when surrounded by many other interns."
    emailformat.innerHTML = "[last]_[first]@bah.com (ie. smith.john@bah.com)"
    firmlogo.src = "images/firmlogos/booz.png"
}
const oliver_button = document.querySelector('#oliverwyman')
oliver_button.onclick = () =>{
    console.log("YOOO")
    firmname.innerHTML = "Oliver Wyman"
    writeup.innerHTML = "Oliver Wyman is a global management consulting firm. Their main services include strategy consulting, risk management, and organizational effectiveness, while their top industries include financial services, healthcare & life sciences, transportation & services, and private capital. The firm is known to have a very collegiate culture, with an emphasis on hard work, but also enjoying the process. They are known to have a flat culture, as even the youngest of employees are encouraged to speak up and challenge ideas. Plus, they have a huge focus on work life balance. The firm has a presence in over 60 cities across the world, with its main American office location in New York. Teams are often staffed across offices."
    interviewsum.innerHTML = "Within the recruiting process, standard networking is important to get an interview at OW. After applications, the interview process consists of two formal rounds. The first round is typically two interviews, one being a case and the other being behavioral. Then, the final round is another set of casing and behavioral interviews. Interns and entry level associates are generalists, yet staffing is very flexible and consultants can start to specialize within a year or two on the job."
    emailformat.innerHTML = "[first].[last]@oliverwyman.com (ie. john.smith@oliverwyman.com)"
    firmlogo.src = "images/firmlogos/oliver.png"
}
const clearviewhealthcare_button = document.querySelector('#clearviewhcp')
clearviewhealthcare_button.onclick = () =>{
    firmname.innerHTML = "ClearView HCP"
    writeup.innerHTML = "Clearview is a boutique healthcare consulting company. The firm pretty much works on anything within the healthcare industry except for healthcare services. Some of their specific offerings include working with pharmaceutical and biotechnology companies to help them develop new drugs and treatments, and helping companies expand into new disease spaces. They are known to be the most prestigious of all healthcare consulting firms, and often fight against the Big 3 consulting firms for projects. Work culture at the firm is known to be very collaborative and light-hearted. Upper level management is quick to offer help and advice to younger consultants. Plus, at Clearview, the firm understands that not everyone will stay in consulting forever, as the firm is a great place to start any career in the healthcare field. Because of this, the firm hosts professional development workshops and gives many mentorship opportunities to set their employees up for future success. All workers are generalists at Clearview, but all within the healthcare industry."
    interviewsum.innerHTML = "Networking is valued at Clearview, and definitely helps towards landing an interview at the firm. The interview process starts with a preliminary phone call interview that is typically a life-sciences consulting case. The next round is typically two interviews with junior staff members, consisting of behavioral questions and a case. The final round is the same as the previous round, except it is typically with more senior consultants, and the behaviorals are to see if you are a fit for the firm. The firm has 3 offices in the US, with Boston being its headquarters, and the NYC and San Francisco offices known to be newer and more competitive for internship offers."
    emailformat.innerHTML = "[first].[last]@clearviewhcp.com (ie. john.smith@clearviewhcp.com)"
    firmlogo.src = "images/firmlogos/clearview.jpg"
}
const accenture_button = document.querySelector('#accenture')
accenture_button.onclick = () =>{
    firmname.innerHTML = "Accenture"
    writeup.innerHTML = "Accenture is consistently ranked as a top firm in technology consulting, data analytics consulting, and IT consulting. The firm is known to be extremely innovative, and create value at speed and scale for its clients. While technology consulting is Accenture’s bread and butter, the firm also works in many industries and functions across the world. The work culture at Accenture is known to be friendly and not highly competitive: people want to see others succeed. Another reason why people recruit at Accenture is because the diverse capabilities at the firm allow early consultants to pave their own path. They can have a pure strategy role like a Big 3 firm, more of a management consulting role like a Big 4 firm, or focus on technology and innovation. The firm has offices across the world, with some known for specific functions, such as their Charlotte office having more banking clients."
    interviewsum.innerHTML = "The recruiting process at Accenture is known to be standard. Networking is definitely important towards landing an interview, so be sure to reach out to a couple of your school’s alumni at the firm. After submitting an application, the first round interview is known to be entirely behavioral. Then, the next round is known to be two interviews, one being a case, and the other being behavioral. In terms of specialization, analysts start as generalists and can start to specialize after a year or two on the job."
    emailformat.innerHTML = "[first].[last]@accenture.com (ie. john.smith@accenture.com)"
    firmlogo.src = "images/firmlogos/accenture.png"
}
const westmonroe_button = document.querySelector('#westmonroe')
westmonroe_button.onclick = () =>{
    firmname.innerHTML = "West Monroe"
    writeup.innerHTML = "West Monroe is a mid-sized, yet rapidly growing, digital services consulting firm. Their slogan is “Don’t do digital, be digital,” as they position themselves as a firm that was created in the digital age, so they are more capable of solving digital problems than older legacy firms. Teams at the firm are often multidisciplinary, as people from all different functions work together to deliver services to their clients. The work culture at West Monroe is known to be friendly and collaborative. One initiative within the firm is the “Chiefs Program,” which allows anyone within the firm to establish their own committee. This is designed to show the firm’s fun and relaxed culture, while emphasizing the impact that even new hires can have on firm culture. Also, the firm has a huge emphasis on work-life balance, with interns typically working just 40 hours per week. In terms of offices, Chicago is the central hub, and the firm’s first office. The DC office is the largest hub for IT Strategy and Business Process Optimization (BPO) because of their acquisition of a DC based IT firm, Pace Harmon. Also, the firm has a tech focus in its San Francisco office and a finance focus in its NYC office."
    interviewsum.innerHTML = "The internship at West Monroe is consistently ranked among the top programs. The applications are rolling, so be sure to apply as soon as you feel interview ready. Candidates apply into a specific practice area such as IT Strategy and BPO, Organizational Change Management, and Healthcare to name a few. The interview process starts with a HireVue, which typically asks standard behavioral questions. Then, the final round is a super day of 3 interviews, consisting of two behavioral interviews and one case. One of the behavioral interviews typically goes into why the candidate would be a good fit for the specific position they applied to, while the other is more conversational."
    emailformat.innerHTML = "[first_initial][last]@wmp.com (ie. jsmith@wmp.com)"
    firmlogo.src = "images/firmlogos/westmonroe.jpg"
}
const lek_button = document.querySelector('#lek')
lek_button.onclick = () =>{
    firmname.innerHTML = "LEK"
    writeup.innerHTML = "LEK is a top ten global management consulting firm, most known for their work in healthcare consulting. While the firm’s small size allows it to maintain a tight-knit culture and give its workers more of an opportunity for upward mobility, they still have the capabilities and clientele of a large firm. Some of their other main services include strategy, retail, and TMT consulting. They are known to have a driven work culture, with many opportunities for mentorship, development, and team bonding. Associates at LEK typically travel less than those at competing firms, and thus are generally staffed on project teams within their home office. LEK US is headquartered in Boston, but there are also offices in New York, Chicago, San Francisco, LA, and Houston. The firm was also founded in London, so there are multiple offices across Europe and Asia, with the option to do a 6-month office swap."
    interviewsum.innerHTML = "LEK offers several internship programs with both generalist and specialized options, though specialization is limited to certain industry teams, like healthcare. The recruiting process at LEK is known to have two rounds. The first is a set of two interviews, with casing and behaviorals in each. These interviews are known to have some more difficult quantitative reasoning questions than a typical interview. The following round is a set of 3 interviews, with multiple cases of different types: quantitative reasoning, qualitative reasoning, and strategy. All interviews are known to kick off with some behaviorals before getting into the cases. The internship recruiting process is known to be extremely competitive because of the small size of the firm and internship class, so be sure to network well to get an edge in the process."
    emailformat.innerHTML = "[first_intial].[last]@lek.com (ie. j.smith@lek.com)"
    firmlogo.src = "images/firmlogos/lek.png"
}
const treacycompany_button = document.querySelector('#treacycompany')
treacycompany_button.onclick = () =>{
    firmname.innerHTML = "Treacy & Company"
    writeup.innerHTML = "Recently acquired by advisory firm, Cherry Bekaert, Treacy & Company (new official name Treacy & Company by Cherry Bekaert) is a boutique strategy, growth, and innovation consulting firm. Working across industries, the company is dedicated to helping its clients grow faster, more profitable, and more steadily than before. Firm culture is known to be extremely collaborative, with ample opportunities for team bonding and mentorship. Also, there are firm-wide meetings every week. Plus, the company has a meritocratic advancement structure, allowing many younger employees to advance much quicker up the ranks than opposing firms. The firm has two offices, one in Boston and the other in Chicago. Oftentimes, projects will have workers from both offices on them."
    interviewsum.innerHTML = "Because Treacy & Company is a boutique consulting firm, networking is definitely important. The interview process is typically two rounds. The first round is two cases, while the second round is two case interviews and a behavioral interview with a partner at the firm. The cases are typically interviewer-led and relevant to the company’s value proposition and main services. All employees at the firm are generalist, while some consultants begin to informally specialize after a couple years on the job."
    emailformat.innerHTML = "[first_initial][last]@treacy.co (ie. jsmith@treacy.co)"
    firmlogo.src = "images/firmlogos/treacy.png"
}
const rolandberger_button = document.querySelector('#rolandberger')
rolandberger_button.onclick = () =>{
    firmname.innerHTML = "Roland Berger"
    writeup.innerHTML = "Founded in Germany back in 1967, Roland Berger is a global management consulting firm. Some of their top industries include retail, energy, and environmental sustainability, while they also consult within the pricing, sales & marketing space. The firm has a big focus on sustainability and social change, using their consulting services towards making a positive impact on the world. In terms of work culture, Roland Berger is known to have a friendly environment and hosts many social and bonding events. While the company is based in Germany, their biggest US office is in Chicago, and they also have notable offices in Boston and Detroit."
    interviewsum.innerHTML = "Roland Berger often hosts recruiting events at their target universities: both general and invite-only. The interview process typically consists of two rounds. The first round is a case interview and the second round is both a case and a behavioral interview. Interns come in as generalists. In the US, Roland Berger is known to heavily recruit from midwest schools such as the University of Michigan, UChicago, and Northwestern."
    emailformat.innerHTML = "[first].[last]@rolandberger.com (ie. john.smith@rolandberger.com)"
    firmlogo.src = "images/firmlogos/roland.jpg"
}
const corner_button = document.querySelector('#cornerstone')
corner_button.onclick = () =>{
    firmname.innerHTML = "Cornerstone"
    writeup.innerHTML = "Cornerstone Research is a consulting firm that focuses on economic and financial analysis for law firm clients. They mainly conduct research to assist their clients throughout every phase of commercial litigation and regulatory proceedings. When a law firm acquires a new client – for example, they’re hired to defend a company that’s accused of wage fixing – the law firm can hire Cornerstone Research to conduct the financial and economic analyses needed to defend their client in court. Their cases span across all industries, and the type of cases they work on include antitrust, securities, consumer finance, M&A, and accounting. The firm is known to have an academic, yet supportive environment, with many of its analysts going on to pursue PhDs, MBAs, and JDs. While the firm has 7 office locations, Cornerstone is a “one-firm firm”, meaning they collaborate across offices, and certain offices aren’t tied to one practice area. However, their biggest offices are in NYC and SF."
    interviewsum.innerHTML = "Economic consulting in general differs from management consulting, so be sure to learn the differences and keep that in mind when interviewing and applying to Cornerstone. Networking is of standard importance at the firm. The interview process is typically two rounds. The first round is typically one behavioral interview and two cases, while the second round is a super day of more cases and behavioral interviews. Analysts are all generalists, and work on a variety of case types. After 3 years or so, consultants become more specialized based on their experience and interests."
    emailformat.innerHTML = "[first_initial][last]@cornerstone.com (ie. jsmith@cornerstone.com)"
    firmlogo.src = "images/firmlogos/cornerstone.png"
}