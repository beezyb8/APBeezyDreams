<?php
    define('__CONFIG__', true);
    require_once "../inc/config.php";

    // Page::ForceLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Leg Up</title>
    <link rel="icon" type="image/x-icon" href="/images/logos/mlu_favicon.png">
    <link rel="stylesheet" href="css/navbar/non_dash_nav.css">
    <link rel="stylesheet" href="css/bestpractices/best_practices.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<div class="body_div_body">
    <nav class="nav_bar_sticky">
        <div class="logocont">
            <img src="../images/logos/navlogo.png" alt="MLU logo" class="logo" height="80px">
        </div>
        <div class="links">
                <a href="consulting.dashboard.php"><p class="innernav_txt">Dashboard</p></a>
                <a href="consulting.allcontacts.php"><p class="innernav_txt">Network</p></a>
                <a href="consulting.applications.php"><p class="innernav_txt">Applications</p></a>
            <a href="consulting.bestpractices.php"><p class="innernav_txt current_nav">Best Practices</p></a>
            <a href="consulting.accountpage.php"><p class="innernav_txt">Your Account</p></a>
        </div>
        <i class="bi bi-menu-down drop_down"></i>
        <i class="bi bi-menu-up drop_up"></i>
    </nav>
        <div class="dropdown_links">
            <a href="consulting.dashboard.php"><p class="drop_innernav_txt">Dashboard</p></a>
            <a href="consulting.allcontacts.php"><p class="drop_innernav_txt">Network</p></a>
            <a href="consulting.applications.php"><p class="drop_innernav_txt">Applications</p></a>
            <a href="consulting.bestpractices.php"><p class="drop_innernav_txt drop_current_nav">Best Practices</p></a>
            <a href="consulting.accountpage.php"><p class="drop_innernav_txt">Your Account</p></a>
        </div>
    <div class="bodycont">
        <div class="header">
            <h1>Best Practices</h1>
            <p><b>This advice was gathered and put together through research, interviews, and personal experiences.</b></p>
        </div>
        <div class="pagelinks">
            <ul class="pagelinks_cont">
                <li class="changecont" id="gennw">
                    <p class="sectiontab">General<br>Networking</p>
                </li><li class="changecont" id="sendemails">
                    <p class="sectiontab">Email<br>Management</p>
                </li><li class="changecont" id="compres">
                    <p class="sectiontab">Company<br>Presentations</p>
                </li><li class="changecont" id="behav">
                    <p class="sectiontab">Behavioral<br>Interviews</p>
                </li><li class="changecont" id="techint">
                    <p class="sectiontab">Casing<br>Interviews</p>
                </li><li class="changecont" id="formats">
                    <p class="sectiontab">Formats +<br>Resources</p>
                </li>
            </ul>
        </div>
        <div class="text_cont">
            <div class="get_start">
                <h1 class="section_header">Getting Started</h1>
                <p>So, you’ve decided to start recruiting for a consulting internship. Even if you know nothing about this process, here are a few things that will help you get started.</p>
                <ol>
                    <li>Reach out to any person you know that has a job in consulting or is still in college and recruited for an internship. Your best help is to have someone who has done this process and can aid you throughout it.</li>
                    <li>Start finding consultants to network with. Reference the “General Networking” tab above to learn how to find and form connections. During the calls, ask for guidance with the recruiting process and learn more about their firm.</li>
                    <li>Research different firms. Use My Leg Up, the internet, and your network to discover which firms you are most interested in. Prioritize these firms, but continue to research other firms as well.</li>
                    <li>Attend recruiting events on campus to network and learn more about each firm. Use the “Company Presentations” tab above to learn more about the events.</li>
                    <li>Start learning how to case. Look at the “Casing Interviews” section to learn how to start. It’ll also teach you a lot about whether consulting will be something you’d like to do or not.</li>
                    <li>Find application links. We will continue to update the recommended links as they come out, but also find companies you are interested in applying for and input them into firm pages on My Leg Up to stay organized.</li>
                    <li>Spend a certain amount of time each week sending cold emails, networking with consultants, and casing.</li>
                </ol>
            </div>
            <div class="gennwcont">
                <h1 class="section_header">General Networking</h1>
                <h3>Building Your Network</h3>
                <p>When preparing for consulting recruiting, leveraging your university’s alumni network is key. Finding consultants who are graduates of your school can be one of the most consistent ways to set up networking calls and begin forming connections. Utilizing LinkedIn’s screening feature to identify alumni who are working at your target companies is a great first step.</p>
                <p>Throughout the first month or two of recruiting, one good practice is to spend a couple of hours at the start of each week finding people and schedule sending emails to them asking for networking calls. For reference, schedule send is a feature on google mail that allows you to set a future send time to any email. Schedule send is your friend because if you’re up at 11PM on a Sunday finding these people, it’s unprofessional to send those emails late at night or on a weekend. Use odd times in the morning like 8:12 or 9:03 to schedule send, because the traditional 8:00 on the dot email basically tells them you’re schedule sending. However, if you are schedule sending, make sure you are awake during the time it sends. This way, if a consultant responds immediately after it sends, you can respond back and potentially get a quick phone call out of it. Another good practice is to send a majority of your cold emails on Tuesdays. That way, inboxes aren’t swamped from the weekend and/or busy Mondays, and you’ll typically get a better response rate. Once interviews start, your networking efforts can start to fade off so you can focus more on interview prep.</p>
                <h3>Networking Goals</h3>
                <p>When networking, there are a couple primary goals you should be looking to achieve. The main and obvious goal is to try to form some connections with young employees at your target firms. Most firms have recruiting teams made up of university alumni that they send to each of their target schools, and those are the people you should make an effort to meet and talk to. Almost always, that team contributes to the decisions regarding interviews and offers. Also, it is super beneficial when you can talk about your phone calls in your interviews or cover letter because it shows you took the time to network and you created a good relationship with a consultant. Plus, a genuine connection adds someone to your network who you can go to when you have a question or need advice. Try your best to leave a lasting impression with the people you network with, as typically all employees have the power to recommend candidates. Make yourself stand out!</p>
                <p>Additionally, networking can be a space to ask vital questions regarding company culture which may help you make decisions between firms down the line. If you create good connections, you can count on them for honest opinions if that time comes. Lastly, in terms of numbers, 3-4 networking calls for a majority of firms is sufficient exposure to be in good standing going into the application process. However, some people will get interviews with 1-2 calls, and some won’t with 5-6 calls. The impact that networking and a recommendation have on the process varies widely by firm. As a networking rule of thumb, the smaller the firm is, the greater impact networking and a recommendation will have on your chances of success.</p>
                <h3>Networking Calls</h3>
                <p>Networking calls mainly test one’s ability to speak with others. Many recruiters state that half the battle in this process is being personable. During networking calls, be sure to ask genuine questions about the consultant’s jobs and their lives. Although the process seems superficial and that networking is just a check the box, developing one genuine connection at a firm is a huge help. They can help you from the inside and give you advice throughout the process. When going into a networking call, be yourself and be prepared. Here are some tips to help you out.</p>
                <p>Going into every networking call, make sure that you have done your homework. One good practice is to spend a couple minutes checking out the consultant’s LinkedIn prior to a call with them to formulate a list of questions. This way, if the conversation ever runs dry, you can use that list to spark up some more discussion. Try your best to ask tailored questions towards their experiences to show that you’ve prepared for the call. You can find some example questions for networking calls on the “formats and resources” tab. Word of warning however, once the conversation begins flowing naturally, use the list as a last resort because an awkwardly timed, random question can kill the conversation.</p>
                <p>During phone calls, it is common to spend the first 5 or so minutes with small talk: asking how they’re doing, how their week has been, or if they have anything planned for the weekend.</p>
                <p>When the conversation fades, ask to hear about their story: where they’re from, their time in college, and why they chose consulting- questions along those lines. This way, they tell a story about their lives, and you can ask questions to branch off of it. Especially when they talk about their time at their firm, make sure to ask about their case experience: asking about their favorite, least favorite, or most unique case experiences. Likely they’ll also ask to hear your story and why you are recruiting for consulting, so be prepared with the answer to that. Finally, it’s a good practice to spend the last few minutes of the call asking about what they like to do outside of the office, including their interests and hobbies. Aim to speak for around 25-30 minutes, but some calls go shorter or longer naturally.</p>
                <p>If the conversation goes well, the consultant will typically offer to help in any way they can, suggesting that you can reach out again if extended an interview and seek further advice. This can be a great time to ask if they know anyone at the firm who has worked in an industry you find particularly interesting. The majority of the time, they will know at least one person and share the contact. However, if they do not offer their help, avoid asking as it may make them feel like a stepping stone. Always close your calls with a polite thank you, showing appreciation for their time, and follow up with a thank you email in the afternoon or next morning. One final note about networking: if you are feeling confident, try asking to set up a zoom networking call. Oftentimes, being able to see the other person makes the conversation easier, and it’ll be easier for them to recognize you down the line.</p>
            </div>
            <div class="send_emails">
                <h1 class="section_header">Email Management</h1>
                <h3>Subject Lines</h3>
                <p>First, always start your subject lines with your first and last name. The more consultants see your name, the better: name recognition is super important. After your name, put a dash and then the occasion of the email whether that be a thank you note, or simply networking for a phone call.. Additionally, if you have a connection to the person, always add that to the subject line so it pops out and grabs their attention as they’re scrolling through their inbox. Examples of potential subject lines are: Your Name- Thank You for Networking Call, Your Name- U of M Student Reaching Out, Your Name- (Club) Member Reaching Out, Your Name- Interested in (Firm Name), Your Name- Friend of (Connection) Reaching Out. Remember, these consultants get hundreds of emails per day from clients, co-workers, and other students recruiting, so try to stand out with your email subject lines.</p>
                <p>To note: some people prefer to write the occasion for the email before their name (ie. Thank You- Your Name) as the structure for their subject lines, which works too.</p>
                <h3>Follow Up Emails</h3>
                <p>Whenever you send a cold email and don’t get a response, wait one week from the time you sent it and then follow up. It’s important not to appear rude or too pushy with these emails, as consultants are extremely busy and they could have simply missed your email. Check the “formats and resources” section for help on this. If consultants don’t respond a second time, most people typically move on and focus their time on another contact. However, if you believe that it’s super important that you talk to this person, wait another week after the second email to give it one last go. </p>
                <h3>Thank You Emails</h3>
                <p>In the “formats and resources” section, there are 3 examples of thank you emails: one after a networking event, one after a networking phone call, and another after an interview. For each of these, your timing should be a little different. The general rule for all thank you emails is to send them 2-24 hours after the call/event. For networking events, it’s not super important when you send your thank you email; typically the next day is a good time. In terms of networking phone calls, if the call is in the morning, send the thank you email that afternoon. However, if the call is in the afternoon, send it the next day (try not to send any email past 5:30 or 6PM, as it’s unprofessional to do so that late). It’s also common practice to not send thank yous right after the call. Let the call digest with them, and then when they see your thank you note later on, it’ll leave a good impression. The only time it is best to send an email to them shortly after talking with a consultant is with interviews. Sometimes the interviewers are making decisions about super days or offers only a few hours after the interview. Here, it is best to send thank you notes about 1-2 hours after the interview to ensure that they see the note before making decisions.</p>
            </div>
            <div class="comp_pres">
                <h1 class="section_header">Company Presentations</h1>
                <h3>At Recruiting Events</h3>
                <p>It is important to leave a good impression at company presentations and networking sessions. During the presentation, be sure to bring a pen and paper to take notes on the firm (using a computer is unprofessional). Many recommend having a designated notebook or a padfolio for recruiting to keep all your notes in the same place. Write notes on the company profile, reputation, and your thoughts on the speakers. As much as the process is about the firm finding their ideal candidates, you should be critical of the firm too. If you thought the firm reps seemed boring or rude, maybe that’s a firm you put at the bottom of your list. Fit is a two-way street.</p>
                <p>Be sure to write down the names of the employees who are there, because those names are important when sending thank you emails and potentially setting up calls. During the networking portion of events, people will circle up with consultants and ask questions one at a time. One valuable part of this comes from catching a point they talk about, because then you can use that point in a thank you email to them. For example, if you hear Associate X talking about their time on a project in London for the business transformations team, it’s a great practice to mention that in your thank you email. That way, your email is more personable, and you are more likely to get a call if you ask for one. Besides that, ask questions you are genuinely interested in hearing the answers to. Specific questions make you more memorable as well.</p>
                <p>The next day, be sure to send thank you emails to all of the consultants that you spoke with. You can ask them for calls, or just thank them for their time. Either way, it’s respectful to show gratitude for their time and effort hosting the event. Check out the “formats and resources” section for an example of this type of email.</p>
            </div>
            <div class="behav_int">
                <h1 class="section_header">Behavioral Interviews</h1>
                <h3>Our Advice</h3>
                <p>Interviews can be nerve wracking. For consulting, sometimes only 10% of applicants get interviews, so be proud of yourself, confident in your abilities, and know that you belong in that room. We recommend that you begin prepping behaviorals at least two weeks before your first application is due. This will ensure that you have had sufficient time to network and learn about firms while also making sure you are ready for the interview on the day you apply.</p>
                <h3>Importance of Behaviorals</h3>
                <p>While having good casing skills is definitely important, the real way you differentiate yourself is through behaviorals. Oftentimes recruiters will say that the firm can teach you how to use excel and market size, but they won’t be able to change your personality. The interviewers want to know who you are, what you’ve done, why you’d be a good fit at the firm, and how well you can articulate those answers. The most important 3 questions for each behavioral interview are 1) tell me about yourself, 2) why do you want to work in consulting, and 3) why are you interested in our firm. Good casing skills will typically prevent you from being cut in the first round, but good behaviorals will get you the offer.</p>
                <h3>Common Questions Explained</h3>
                <p>The answers to these three questions should tell the interviewers a lot about you, and it is your time to differentiate yourself. Your response to the “Tell me about yourself” question should be about 2-3 minutes long. To note, it should be treated similarly to the question, “Walk me through your resume.” The answer should start with your interests and/or passions, and why that led you to study business/economics/your major. Next, weave in your experiences on your resume and explain how that led you to recruit for consulting. The “Why Consulting” question should be personal to you. A lot of people mention the following ideas: you will get exposure to many different industries, work in a fast paced environment, experience working with many different projects and teams, interact with clients, and have a lot of responsibility right out of college. Finally, the “Why ______ Firm?” is obviously dependent on each firm, and should be genuine for each. One answer structure that many people follow is as follows: place, people, program. Add specific examples/ details in each category to explain why you would love to work at ________ firm. Many people reference their favorite networking call in this question, stating that they really enjoyed talking to him/her, and some other specific reasons why the firm and program fits their interests and strengths.</p>
                <h3>Other Common Questions Explained</h3>
                <p>The next most popular set of questions will focus on your resume. Down to the smallest detail, anything on your resume is fair game for them to ask about. Make sure you know the in’s and out’s of every bullet on your resume with a detailed explanation of how each was achieved. Also, almost every interviewer will ask about the experience you had the summer before applying. Other common behavioral interview questions that firms often ask about are related to: your strengths and weaknesses, times you were a leader, an experience of teamwork, and your role in teams, Another good practice is to read the news during interview season, so if a company asks you about a certain current event, you are up to date on it. The Morning Brew is a great, quick news source that will keep you in the know.</p>
            </div>
             <div class="tech_int">
                <h1 class="section_header">Casing Interviews</h1>
                <h3>Casing Overview</h3>
                <p>One huge thing about casing is that it is not a one-size-fits-all process. Some people may want to read multiple casing books, and some may not want to read any. It's about the best way that you learn. Additionally, some people learn how to case much faster and require less practice than others, while some people require much more time on task. Wherever you fall on this spectrum, here are some pieces of advice that we think are good guidelines.</p>
                <p>While casing may be viewed as a confusing process, what is truly being tested is your ability to think critically. Fortunately, massive amounts of time and money has been spent making the process easy to learn and simple to understand.</p>
                <h3>Preparation Timeline</h3>
                <p>We suggest that you begin your casing journey roughly 2 months before your first application deadline. This provides ample time to understand the concept and gain the skills necessary to secure an offer at your favorite company. The easiest way to get a grasp on the case is by reading Case Interview Secrets by Victor Cheng. The book breaks down exactly what a case is and some tips on how to perform one. Afterwards, you should perform one or two cases with an upperclassman who has gone through the recruiting process or a peer coach/career office member at your school. Together, these will give you a general understanding of the case process.</p>
                <p>Next, try to get your hands on Case In Point and/or a subscription to managementconsulted.com or rocketblocks.com (again, some people may want to look at these additional resources, and others may not- it all depends on your learning style). Typically we suggest asking the career department at your university about these resources as many have partnerships with the companies and provide students access for free. Case In Point will provide some key frameworks that can help in beginner level cases while the websites will help you hone more specific skills such as market sizing and brainstorming.</p>
                <p>Combining these resources, we suggest you do roughly 2-4 cases per week in the two months leading up to your first interview. Doing so will make sure you have at least 15 cases under your belt before you step into the 1st round interview, a safe amount for most firms you will be applying to. While casing, try your best to case with different individuals, as the variety of feedback will make you a dynamic caser and give you diverse knowledge for executing under pressure.</p>
            </div>
            <div class="temps">
                <h1 class="section_header">Formats + Resources</h1>
                <h3>Applications</h3>
                <p>We will update a spreadsheet on the “Applications” page with a list of the general consulting internships for main firms. Besides that list, you are responsible for finding application links for the firms you want to apply to. If you are in a club on campus, these may get sent around, but if you are not, you should search the web for them. They’re easy to find by simply searching “(Firm) 2024 Summer Internship,” and going through their website to find the correct link. Input them into each firm page on My Leg Up to stay organized. Being on top of applications is super important, so if we haven’t posted a specific link you are interested in, be on the lookout for it.</p>
                <h3>Resumes</h3>
                <p>Getting personalized help for improving your resume is extremely beneficial. If your school offers help either through peer coaches or a Career Office, definitely use it. However, if you don’t have those resources, here are some general notes on resumes. Your resume should be split into 3 sections: Education, Experience, and Additional. For Education, add your University/College, intended degree, GPA, majors/minors, and any awards or honors you have received. For the Experience section, you should have 3-5 experiences that you can tailor towards a career in consulting. For each experience, include 3 bullets explaining what you did. For each bullet, use the Action, Context, Result (ACR) format to give a holistic summary of your experience. This means starting each bullet with an action word, like created, facilitated, or led. Then, provide enough context so the reader can understand what you did during the experience. Finally, indicate the deliverable you finished or the impact you made on the company. Including numerical values for quantification of impact is great. Finally, the Additional section is your space to add hobbies, interests, and fun facts. Unique additional sections are traditionally the best.</p>
                <h3>Cover Letters</h3>
                <p>Much like resumes, personalized advice is helpful for cover letters. Career Offices are definitely a great resource for cover letter reviews. Traditionally, cover letters should be addressed to the firm’s office that you are recruiting to. Then you can follow that with “Dear (Head Recruiter’s Name),” “To whom it may concern,” or “To (Firm Name)’s Recruiting Team.” The content of the cover letter should start with a brief introduction outlining why you are interested in the firm and ending with 2-3 reasons why you think you are qualified for the position. The introduction is a great place to name drop individuals you have networked with and mention what they taught you/why they made you want to apply to the firm more. This reinforces the idea that you took the time to network, heightening your interest in the firm. Next, go in-depth about these 2-3 reasons in consequent paragraphs. Finally, end with a recap of your points, thank them for reading, and sign your name at the bottom. Try to fit your cover letter on one page.</p>
                <h3>Example Questions for Networking Calls</h3>
                <ul>
                    <li>What led you to pursue a career in consulting?</li>
                    <li>What led you to specifically join _______ firm?</li>
                    <li>Is there a specific project you’ve been working on recently that’s been particularly interesting?</li>
                    <li>Do you have a favorite project that you’ve worked on?</li>
                    <li>How would you describe the culture at your firm?</li>
                    <li>What was your internship experience like?</li>
                    <li>How was the transition from intern to full time?</li>
                    <li>What were some of your highlights from the summer internship?</li>
                    <li>What led you to choose a boutique over a Big 3/4 (or other way around)?</li>
                    <li>How do you like NYC (or the city they’re in)?</li>
                    <li>What are some things you like doing for fun outside of the office?</li>
                    <li>What did you study in college?</li>
                    <li>What was it like going to ____ college?</li>
                    <li>Do you have any advice for someone going through the consulting recruiting process?</li>
                </ul>
                <h3>Email Examples</h3>
                <h4>After Networking Event</h4>
                <p>Hi Bryan,</p>
                <p>I just wanted to reach out to thank you for taking the time to speak with me yesterday at the PwC Recruiting Event. It was really interesting hearing about your time in the technology group, and how your responsibilities changed as you went from an intern to full time on the desk.</p>
                <p>Thanks again and I look forward to staying in touch as recruiting continues.</p>
                <p class="best">Best,</p>
                <p>Nate</p>
                <h4>Cold Email to Umich Alum</h4>
                <p>Hi Brandon,</p>
                <p>My name is Nate Ramras, I'm a BBA sophomore at the University of Michigan, and I'm recruiting for consulting in this upcoming cycle. I'm very excited to attend the BCG information session next week.</p>
                <p>If you have any availability before then, I would love to hop on the phone with you and learn more about your personal experiences at the firm within the consumer & retail team. I understand you are very busy, but I'm happy to work around your schedule.</p>
                <p>Thank you so much and Go Blue!</p>
                <p class="best">Best,</p>
                <p>Nate</p>
                <h4>After Networking Call</h4>
                <p>Hi Lili,</p>
                <p>Just wanted to reach out to thank you for speaking with me yesterday. It was great learning all about your experiences in the LA office, and I really appreciate all the advice you gave me. Thanks again, and I look forward to staying in touch throughout the process!</p>
                <p class="best">Best,</p>
                <p>Nate</p>
                <h4>After An Interview</h4>
                <p>Hi Monica,</p>
                <p>Thank you so much for taking the time to interview me today. It was great hearing about your time at the firm, specifically your time in the consumer retail group. I really appreciate your time, your answers to my questions, and the opportunity to interview for McKinsey.</p>
                <p>Thanks again, and I hope you have a great rest of your week!</p>
                <p class="best">Best,</p>
                <p>Nate</p>
                <h4>Follow Up</h4>
                <p>Hi Kendall,</p>
                <p>Just wanted to follow up on this email. It was great getting to meet you at the KPMG event last week, and I would love the chance to speak with you further to learn more about your time at the firm. My week is pretty open, and I'm happy to work around your schedule to find a time. Thank you so much!</p>
                <p class="best">Best,</p>
                <p>Nate</p>
            </div>
        </div>
    </div>
    <script src='../assets/js/bestpractices.js'></script>
</body>
</html>