<?php
    define('__CONFIG__', true);
    require_once "../inc/config.php";

    Page::ForceLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Leg Up</title>
    <link rel="icon" type="image/x-icon" href="/images/logos/mlu_favicon.png">
    <link rel="stylesheet" href="css/bestpractices/updatebp.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=AR+One+Sans:wght@400;500;700&family=Poppins:ital,wght@0,100;0,300;0,400;0,600;0,700;1,100&family=Raleway:ital,wght@0,200;0,300;0,400;0,500;0,700;1,700&family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<div class="body_div_body">
    <section class="nav_section">
        <nav>
            <a href="https://mylegup.co/consulting24-25/consulting.dashboard.php"><img src="../images/logos/navlogo.png" alt="MLU Logo"></a>
            <div class="nav-links" id="navlinks">
                <i class="bi bi-x-lg" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="https://mylegup.co/consulting24-25/consulting.dashboard.php">Dashboard</a></li>
                    <li><a href="https://mylegup.co/consulting24-25/consulting.allcontacts.php">Network</a></li>
                    <li><a href="https://mylegup.co/consulting24-25/consulting.applications.php">Applications</a></li>
                    <li><a href="https://mylegup.co/consulting24-25/consulting.thevibe.php">The Street</a></li>
                    <li><a href="https://mylegup.co/consulting24-25/consulting.bestpractices.php">Best Practices</a></li>
                    <li><a href="https://mylegup.co/consulting24-25/consulting.accountpage.php">Your Account</a></li>
                </ul>
            </div>
            <i class="bi bi-justify" onclick="showMenu()"></i>
        </nav>
        <div class="second_header_nav">
            <div class="filter_title">
                <h5>Best Practices</h5>
            </div>
            <div class="best-sum">
                <div class="best-sum-text">This page is an aggregated advice section touching on the most crucial elements of a succesful recruiting experience. It was created with the help of many past successful applicants.
                </div>
            </div>
        </div>
    </section>
    <div class="bodycont">
        <div class="header">
        </div>
        <div class="pagelinks">
            <ul class="pagelinks_cont">
                <li class="changecont" id="gennw">
                    <p class="sectiontab">Networking</p>
                </li><li class="changecont" id="sendemails">
                    <p class="sectiontab">Emails</p>
                </li><li class="changecont" id="compres">
                    <p class="sectiontab">Company<br>Presentations</p>
                </li><li class="changecont" id="behav">
                    <p class="sectiontab">Behavioral<br>Interviews</p>
                </li><li class="changecont" id="techint">
                    <p class="sectiontab">Casing<br>Interviews</p>
                </li><li class="changecont" id="formats">
                    <p class="sectiontab">Formats and<br>Resources</p>
                </li>
            </ul>
        </div>
        <div class="text_cont">
            <div class="get_start">
                <h1 class="section_header">Getting Started</h1>
                <p>So, you’ve decided to start recruiting for a consulting internship. Here are a few things that will help you get started.</p>
                <h3>Chronological Processes</h3>
                <ol>
                    <li>Find firms that you are interested in – there are different types of consulting and different firms specialize in different areas. Look into them and see which ones you might like.</li>
                    <li>Learn more about various consulting firms.
                        <ol class="nested-list">
                            <li>Use My Leg Up, the internet, firm events, and your personal network to discover which firms you are most interested in.</li>
                            <li>Ideally, find a mentor (someone working in the field or someone in college who recruited for a consulting internship) to help you with any questions.</li>
                        </ol>
                    </li>
                    <li>Network with personal connections, school/club/fraternity/sorority alumni, and others who work at these consulting firms prior to submitting applications – this is key to landing first round interviews.
                        <ol class="nested-list">
                            <li>Reference the “General Networking” Section.</li>
                        </ol>
                    </li>
                    <li>Complete and submit the application on the company's portal.
                        <ol class="nested-list">
                            <li>Reference the “Formats + Resources” tab: build out your resume and cover letter.</li>
                            <li>Reference the “Applications” tab. We will continue to update the recommended links as they come out, but also find companies you are interested in applying for and input them into firm pages on My Leg Up to stay organized.</li>
                        </ol>
                    </li>
                </ol>
                <h3>Throughout the Process:</h3>
                <p>Consulting interviews consist of case and behavioral portions. The steps outlined above are key to securing interviews, but these two items are essential to being fully prepared for the content of the interviews themselves.</p>
                <ol>
                    <li>Case Prep
                        <ol class="nested-list">
                            <li>Reference the “Casing Interviews” section to learn how to start.</li>
                        </ol>
                    </li>
                    <li>Behavioral Prep
                        <ol class="nested-list">
                            <li>Reference the “Behavioral Interviews” section to start.</li>
                        </ol>
                    </li>
                </ol>
                <p>The order and amount of preparation to be done for cases and behavioral interviews differs from person to person, but we recommend starting early to be fully prepared once interviews commence. The “Casing Interviews” and “Behavioral Interviews” sections dive deeper into this.</p>
            </div>
            <div class="gennwcont">
                <h1 class="section_header">Networking</h1>
                <p>This section will go into further detail about the main goals of networking, how to go about building your network, and how to ensure that you make a positive impression after every networking call. Remember, networking is oftentimes the key to getting an interview at a firm.</p>
                <h3>Goals of Networking</h3>
                <p>When networking, there are a couple primary goals you should be looking to achieve. The main goals are to 1) try to form connections with employees at your target firms (usually at the junior levels) and 2) get answers to questions that you have about the firms. Most firms have recruiting teams made up of university alumni that they send to each of their target schools, and those are the people you should primarily make an effort to meet and talk to. This recruiting team almost always contributes to decisions regarding who gets interviews. Also, it is quite beneficial to be able to talk about your phone calls within your cover letter or in interviews because it shows that you took the time to engage with employees of the firm to learn more about it. A strong, genuine connection also adds an individual to your network who you can go to when you have a question come up or need advice. Try your best to leave a lasting impression with the people you network with, as typically all employees have the power to recommend candidates. Make yourself stand out!</p>
                <p>Lastly, in terms of numbers, 3-4 networking calls for a majority of firms is sufficient exposure to be in good standing going into the application process. However, some people will get interviews with 1-2 calls, and some won’t with 5-6 calls. The impact that networking and corresponding employee recommendations have on the process varies widely by firm.</p>
                <h3>Networking is a Two-Way Street</h3>
                <p>Many recruiters state that half of the battle in the recruiting process is being personable. In the same way that you are learning about and evaluating the firm while networking, the employees of the firm on the other end of the conversation are somewhat evaluating you. They may conduct what is sometimes referred to as the Airport Test: “Would I want to be stuck in an airport with this person?” Therefore, present yourself as someone who they wouldn’t mind being stuck in an airport with. Be sure to ask genuine questions about the consultant’s jobs and their lives. Developing just one genuine connection at a firm is a huge help as they can help you from the inside and provide advice throughout the process.</p>
                <p>When going into a networking call, be yourself and be prepared. First, you should have a list of some go-to insightful questions that you can ask across networking calls. Then, you should make a list of firm-specific questions that apply directly to a given company. Finally, another good practice that can help you stand out is to formulate specific questions for the individual you are networking with after spending a couple of minutes checking out the consultant’s LinkedIn prior to the call. This way, if the conversation ever runs dry, you can use that list to spark discussion. Try your best to ask tailored questions towards their experiences to show that you have prepared for the call. You can find some example questions for networking calls in the “Formats + Resources” section. However, once the conversation begins flowing naturally, use the list as a last resort because an awkwardly timed, random question can kill the conversation. The best networking calls are oftentimes natural conversations.</p>
                <h3>The Actual Networking Call</h3>
                <p>During phone calls, it is common to spend the first couple minutes with small talk: asking how they’re doing, how their week has been, or if they have anything planned for the weekend. Another good way to start calls is to facilitate the discussion yourself: provide your own background and share why you are interested in this call with them.</p>
                <p>Regardless of how you start, ask to hear about their story: where they’re from, their time in college, why they chose consulting, etc. This way, they get to tell a story about their lives, and you can ask follow-up questions. As they talk about their time at their firm, make sure to ask about their case experience: inquire into their favorite, least favorite, or most unique case experiences. Try to stay away from any questions that can easily be found online or directly through their website. They may also ask to hear your story and why you are recruiting for consulting, so be prepared with the answer to that. Finally, it’s a good practice to spend the last few minutes of the call asking about what they like to do outside of the office, including their interests and hobbies. Aim to speak for around 25-30 minutes, but some calls will naturally end a bit short or go longer.</p>
                <p>If the conversation goes well, the consultant may offer to help in any way they can, suggesting that you can reach out again if extended an interview in order to seek further advice. This can be a great time to ask if they know anyone else at the firm who would be interesting or beneficial to speak with. Close your calls with a polite thank you, showing appreciation for their time. Always follow up with a thank you email later in the day or on the following day. </p>
                <h3>Building Your Network</h3>
                <p>As you can likely tell from the information above, it is crucial to build a solid network across firms. Make sure to stay organized here by tracking your contacts within the “Networking” tab. There are multiple ways to find contacts. Generally, the closer and more personal the connection is, the better. A good order could be: family, friends, fraternity/sorority alum, club alum, high school alum, to college alum. The main way to find contacts is by leveraging your university’s alumni network. Finding consultants who are graduates of your school can be one of the most consistent ways to set up networking calls and begin forming connections. Utilizing LinkedIn’s screening feature to identify alumni who are working at your target companies is a great first step. If you are unable to find any such connections at the firm, which may especially be the case with smaller, boutique firms, you can certainly start networking by cold emailing a junior level employee at the firm.</p>
                <p>Throughout the first month or two of recruiting, one good practice is to spend a couple of hours at the start of each week finding individuals and schedule sending emails to them asking for networking calls. Be careful not to mass email employees at the same firm all at once as they may talk to one another and it could reflect poorly on you. For reference, schedule send is a feature on google mail that allows you to set a future send time to any email. Schedule send is your friend here because if you’re up at 11PM on a Sunday finding these contacts, it would be unprofessional to send outreach emails late at night or on weekends. Use odd times in the morning like 8:12 or 9:03 to schedule send, because the traditional 8:00 on the dot email basically tells them that you are schedule sending. However, if you are schedule sending emails, make sure you are awake during the time it sends. This way, if a consultant responds immediately after it sends, you can respond back and potentially get a quick phone call out of it. Another good practice is to send a majority of your cold emails on Tuesdays. That way, inboxes aren’t swamped from the weekend and/or busy Mondays, and you’ll typically get a better response rate. Once interviews start, your networking efforts can start to fade off so you can focus more on interview prep. Ideally, you finish all networking calls prior to submitting the application as networking is key to securing an interview.</p>
            </div>
            <div class="send_emails">
                <h1 class="section_header">Emails</h1>
                <p>This section will dive into the best practices when it comes to sending emails while networking. Email etiquette is very important throughout recruiting as it can be the first and last impression that you leave upon employees at consulting firms.</p>
                <h3>Initial Outreach Emails</h3>
                <p>As consultants are very busy and have lots of emails in their inboxes, make sure to have a concrete, appealing subject line in your outreach. It can help to start your subject lines with your first and last name. If you have a connection to the person, always add that to the subject line so that it grabs their attention as they are scrolling through their inbox. Remember, these consultants get hundreds of emails per day from clients, co-workers, and other students recruiting, so try to stand out with your email subject lines by making your connection to them evident. See the “Formats + Resources” section for examples of quality subject lines.</p>
                <p>Within your initial outreach email, make sure to introduce yourself and make note of any potential connection that you have to the contact. Then, mention why you are reaching out to them. You can briefly hint at what you want to talk about within the networking call as well. End by asking if they have any availability coming up for a phone call and thank them for their time. See the “Formats + Resources” section for examples of quality initial outreach emails.</p>
                <h3>Follow Up Emails</h3>
                <p>Whenever you send a cold email and don’t get a response, wait about one week from the time you initially sent it and make sure to follow up. It’s important not to appear rude or too pushy with these emails, as consultants are extremely busy and could have simply missed your email. If consultants don’t respond a second time, most people typically move on and focus their time on another contact. However, if you believe that it’s super important that you talk to this person, wait another week after the second email to give it one last go. See the “Formats + Resources” section for examples of quality follow up emails.</p>
                <h3>Thank You Emails</h3>
                <p>In the “Formats + Resources” section, there are 3 examples of thank you emails: one after a networking event, one after a networking call, and another after an interview. For each of these, your timing could be a little different. The general rule for all thank you emails is to send them 2-24 hours after the call/event. For networking events, it’s not super important when you send your thank you email; typically the next day is a good time. In terms of networking phone calls, if the call is in the morning, send the thank you email that afternoon. However, if the call is in the afternoon, send it the next day (try not to send any email past 5:30PM, as it is unprofessional to do so that late. It is also common practice to not send thank you emails immediately after the call. The only time to send a thank you email shortly after speaking with a consultant is after interviews. Sometimes the interviewers are making decisions about super days or offers just a few hours after the interview. Here, it is best to send thank you notes about 1-2 hours after the interview to ensure that they see the note before making decisions. See the “Formats + Resources” section for examples of quality thank you emails.</p>
            </div>
            <div class="comp_pres">
                <h1 class="section_header">Company Presentations</h1>
                <p>This section will provide tips on how to leave a positive impression at company presentations and networking events. These serve as another great opportunity to meet employees of these consulting firms.</p>
                <h3>At Recruiting Events</h3>
                <p>During the presentation, be sure to bring a pen and paper to take notes on the firm (using a computer is unprofessional). Many recommend having a designated notebook or padfolio for recruiting to keep all notes in the same place. You can also stay organized by inputting relevant notes that correspond with individuals you have networked with in the “Networking” tab. Write notes on the company profile, reputation, and anything that stands out to you. Specifically, look for anything that you think may be a differentiating factor for the firm presenting. As personal fit is a two-way street, make sure to consider the extent to which you resonate with what the firm seems to stand for.</p>
                <p>Be sure to write down the names of the employees who are there because those names will be important when sending thank you emails and potentially setting up calls. During the networking portion of events, people will circle up with consultants and ask questions one at a time. One valuable part of this comes from catching a point they talk about because you can then use that point in a thank you email to them. For example, if you hear Associate X talking about their time on a project in London for the business transformations team, it is a great practice to mention that in your thank you email. This allows your email to be more personable and makes you more likely to get a call when you ask for one. Most importantly, ask questions you are genuinely interested in hearing the answers to. Specific questions make you more memorable.</p>
                <p>The next day, be sure to send thank you emails to all of the consultants that you spoke with. You can ask them for calls or thank them for their time. Either way, it’s respectful to show gratitude for their time and effort hosting the event. See the “Formats + Resources” section for an example of a post-recruiting-event thank you email.</p>
            </div>
            <div class="behav_int">
                <h1 class="section_header">Behavioral Interviews</h1>
                <p>Interviews can be nerve wracking. A small percentage of applicants make it to the interview stage, so be proud of yourself, confident in your abilities, and know that you belong in that interview room. We recommend that you begin prepping behaviorals about two weeks before your first application is due. This will make sure that you have had sufficient time to network and learn about firms while also ensuring you are ready for an interview when it comes.</p>
                <h3>Importance of Behaviorals</h3>
                <p>While having good casing skills is incredibly important, a great way to differentiate yourself is through your behavioral answers. The interviewers want to know who you are, what you’ve done, and why you’d be a good fit for the firm. The 3 most common and most important questions for each behavioral interview are 1) Tell me about yourself, 2) Why do you want to work in consulting?, and 3) Why are you interested in our firm? Applicants tend to underestimate the importance of the behavioral portion of the interview. This is a big mistake as firms often place a heavy emphasis on behavioral fit, so it is critical that you are able to confidently deliver well thought out answers.</p>
                <h3>The “Big Three” Questions Explained</h3>
                <p>The answers to the three most should tell the interviewers a lot about you, and it is your time to differentiate yourself. Before developing your answers to this question, take some time to think about it from the interviewer’s perspective. What do you want them to think of you solely based on these 3 responses? Overall, it is helpful to know your complete answers to the “Big Three” questions by heart since you are essentially guaranteed to be asked at least one of them in every interview.</p>
                <ol>
                    <li>Tell me about yourself.
                        <ol class="nested-list-repo">
                            <li>This may instead be phrased as “ Walk me through your resume.” You can answer both questions in a similar way. Your response to the “Tell me about yourself” question should be about 1.5-2 minutes long. The best answers to this question tend to tell a cohesive, chronological story that explains what eventually led you to where you are today, interviewing for that specific role. You can start with your name and background. Then, include some of your interests and passions in the answer, and explain how those led you to your field of study. Then, make sure to include some experiences on your resume that you have had which have contributed to and solidified your interest in consulting.</li>
                        </ol>
                    </li>
                    <li>Why consulting?
                        <ol class="nested-list-repo">
                            <li>This answer should be personal to you. Explain to the interviewer how you decided on consulting being the right career path for you. A great way to structure this answer can be to first state what you are looking for in a career. Then, explain how you will be able to experience exactly that within consulting. Some common reasons that are applicable to consulting are exposure to many different industries, exposure to many different business functions, working within a fast paced environment, working within diverse and talented teams, working directly with clients, and having a lot of responsibility immediately out of college.</li>
                        </ol>
                    </li>
                    <li>Why X firm?
                        <ol class="nested-list-repo">
                            <li>This answer is very important because you have to prove to the interviewer that you have done your research and genuinely believe that this firm is the right place for you. There are many ways to structure this answer, but a good rule of thumb is to touch on the people, place, and program of the given firm. Try to highlight what makes the firm unique and how that stands out as something that you desire within your consulting experience - this is where taking good notes during networking calls or company visits can be beneficial. Many interviewees choose to reference a specific firm employee that they spoke with within their answers to highlight aspects that stand out to them and to showcase that they did their homework.</li>
                        </ol>
                    </li>
                </ol>
                <h3>Other Questions Explained</h3>
                <p>The most common set of questions aside from the “Big Three” are situational questions and resume-based questions. However, always be prepared to think on your feet and answer questions that you may have never heard of before as well.</p>
                <ol>
                    <li>Situational questions ask you about a time that you faced a certain circumstance or exemplified a certain trait. They allow you to provide the interviewer with a story that shows them more about who you are. For situational questions, make sure to have about 3-6 stories that you have thought about or written out that can be adapted to various situational questions that you may be asked. Before developing your stories, take some time to think about it from the interviewer’s perspective. What do you want them to think of you solely based on your responses?
                        <ol class="nested-list-repo">
                            <li>Examples: Tell me about a time you failed. Tell me about a time when you led a team. What is your proudest accomplishment? What role do you typically find yourself playing in a team?</li>
                        </ol>
                    </li>
                    <li>Resume-based questions are questions that the interviewer asks after looking at your resume. Anything on your resume is fair game for them to ask about. Make sure you know the content of every bullet on your resume to be fully prepared.</li>
                    <li>Other common behavioral interview questions that firms often ask about can be related to your strengths and weaknesses or questions tailored to determining what motivates you. Also, make sure to read the news throughout your recruitment process. Companies are known to ask about current events, and you want to be up to date on what is going on in the news. The Morning Brew and similar newsletters can be great resources.</li>
                </ol>
            </div>
            <div class="tech_int">
                <h1 class="section_header">Casing Interviews</h1>
                <p>Casing is not a one-size-fits-all process. Some people may read multiple case books while some may not want to or need to read any. It's about finding the best way that you learn. If you are an audio learner, try casing audio books or podcasts. If you are a visual learner, look to online video resources. If you are a hands-on learner, you can simply do as many practice cases as possible. It may be best to utilize a combination of resources. Some people feel comfortable with their casing abilities after less practice than others, while others require much more time on task. Wherever you fall on this spectrum, here is some information that will aid you in the case interview preparation process.</p>
                <h3>What is a Case?</h3>
                <p>Consulting interview cases are designed to mirror real-world business challenges that consulting firms advise on. Case interviews are designed to test your business acumen, communication, and problem-solving skills. They can be looked at as a mini consulting project in which the interviewer presents you with a business problem to consult on. It is typically structured as a 30-45 minute interview in which you go back and forth with an interviewer who asks you guiding questions as you solve the case.</p>
                <p>An example casing prompt could be: “Your client is a multinational supplier of bicycle parts to bicycle manufacturers. Profits have been steady, but the client is worried about an influx of cheaper products from Taiwan. The client has hired you to give a recommendation on how to ensure continued profitability.”</p>
                <h3>Case Components</h3>
                <p>Each consulting case requires unique insights and methodologies to solve the question at hand, but there are 5 key components that one needs to master in order to crack the case.</p>
                <ol class="casetype-list>">
                    <li>Frameworks
                        <p>Frameworks represent a structured and systematic process in order to solve a problem. They allow you to explore questions in different avenues (e.g., Market Growth, Revenues, Competitors) to effectively solve the issue at hand.</p>
                        <p>It is beneficial to create a framework when prompted with the main problem or issue the case interview revolves around, such as <i>“How would you help a manufacturing company increase its profits?”</i></p>
                        <p>It is important to be Mutually Exclusive and Collectively Exhaustive (MECE) when creating a framework. This means that components should not overlap, and combining all components together results in coverage of all possible options or outcomes.</p>
                        <p>When starting off building frameworks, it is okay to rely on pre-made / popular processes to solve an issue (e.g., Profitability Tree). But to become more skilled, it is crucial to curate a framework that is specific to the prompt at hand.</p>
                    </li>
                    <li>Brainstorming
                        <p>Brainstorming is the process of generating ideas through a structured and prioritized process.</p>
                        <p>You would be required to brainstorm when asked the following question: <i>“A software startup wants to increase its recruiting efforts. What are some ways it can do so?”</i></p>
                        <p>The key words here are <i>structure</i> and <i>priority</i> -- brainstorming is not the process of simply listing off ideas that you first think of.</p>
                    </li>
                    <li>Market Sizing
                        <p>Market sizing is the process of calculating the size of a market by using logic and assumptions when given little to no information.</p>
                        <p>You would be required to market size when asked the following question: <i>“What is the market size for tennis shoes in the United States?”</i></p>
                        <p>It is critical to take the interviewer through your process of sizing a market. Instead of doing it all in your head, converse with the interviewer about your structure and assumptions. You are not expected to arrive at the exact answer. Instead, interviewers are testing your ability to think through such problems in an organized manner. You can accomplish market sizing questions by using either a “top down” or “bottom up” approach.</p>
                    </li>
                    <li>Quantitative Analysis
                        <p>Quantitative Analysis is the process of deriving a data point or number when provided with data.</p>
                        <p>You would be required to conduct quantitative analysis when asked the following question: <i>“What is the increase in profit for the washing business after buying a new washing machine?”</i></p>
                        <p>The critical part to understand here is getting the correct answer is the bare minimum. The process of taking the interviewer through your work of obtaining the number and analyzing the significance of the number are critical steps that need to be taken.</p>
                    </li>
                    <li>Graph / Chart Interpretation
                        <p>Graph / Chart Interpretation is the process of generating insights from a premade graph or chart provided by the interviewer.</p>
                        <p>You would be required to conduct graph / chart interpretation when presented with a graph or chart by the interviewer and asked the following question: <i>“What can you tell me about this graph / chart?”</i></p>
                        <p>It is important to not ramble and simply state basic insights presented in the chart -- the interviewer knows information such as the x-axis title and the categories. Interviewers are looking for you to present deeper insights that will drive the case forward.</p>
                    </li>
                </ol>
                <h3>Building Out a Casing Recruiting Plan</h3>
                <p>We recommend that you begin your casing journey roughly 2-3 months before your first application deadline. This provides ample time to understand the concepts behind various frameworks. A common way to get started is to read an introductory case book. Some popular examples include Case In Point Case by Marc Cosentino and Case Interview Secrets by Victor Cheng. These books break down what you can expect a case to look like and provide a plethora of tips on how to effectively go about casing. Another way to get started or to supplement such reading is to listen to full case interviews through podcasts or watch full case walkthrough videos on YouTube. It is very important to have a good understanding of the mechanics of a case interview. Such resources can help you grasp the concept before beginning to practice yourself.</p>
                <p>Next, begin practicing cases. Consulting cases used for practice can either be found on case interview preparation websites (e.g., Management Consulted, RocketBlocks) or in university-affiliated case books (e.g., Ross Case Book 2011, Darden Case Book 2019). Case interview preparation websites typically require a subscription whereas university-affiliated case books can be found on the internet -- common schools that publicly release case books are Ross, Kellogg, Darden, and Wharton. There is no magic number here, but a common number that gets thrown around is to complete anywhere from 15-35 cases prior to your first interview in order to be fully interview ready. Practice cases on your own, with case partners who you are recruiting alongside, and upperclassmen who can provide you with solid feedback. It is very important to review mistakes that you make along the way and to seek out constructive feedback as that will allow you to slowly become more comfortable in dealing with ambiguous prompts. While you can complete full practice consulting cases, don't be afraid to spend extra time on individual components of a case you may be weaker at.</p>
            </div>
            <div class="temps">
                <h1 class="section_header">Formats and Resources</h1>
                <h3>Applications</h3>
                <p>We will update the “Applications” page with a list of the general consulting internships for main firms. Besides that list, you are responsible for finding application links for other firms you may want to apply to. They are easy to find by simply searching “(X Firm) 2025 Summer Internship,” and going through their website to find the correct link. You can then input them into each firm page on My Leg Up to stay organized. Being on top of applications is super important, so if we haven’t posted a specific link you are interested in, be on the lookout for it.</p>
                <h3>Resumes</h3>
                <p>Resumes are a key touchpoint in applications and can be the first impression an interviewer has of you. Getting personalized help by reaching out to upperclassmen and your school’s career office for resume reviews can be beneficial. Your resume should be split into 3 sections: Education, Experience, and Additional. In the Education section, include your University/College, intended graduation year, GPA, majors/minors, and any awards or honors you have received. In the Experience section, you should have 3-5 experiences that highlight your past and current experiences. Tailor these towards a career in consulting if possible. For each experience, include 3 bullets explaining what you did and accomplished. Use the Action, Context, Result (ACR) format to give a holistic summary of your experience in each bullet. This means starting each bullet point with an action word (e.g. created, facilitated, or led). Then, provide enough context so that the reader can understand what you did throughout the experience. Finally, indicate the deliverable you completed or the impact you made on the company. Including numerical values for quantification of impact is encouraged here. Finally, the Additional section is the “fun” section to add hobbies, interests, and fun facts. Do not underestimate the importance of this section, and try to show who you are as a person there.</p>
                <h3>Cover Letters</h3>
                <p>Cover letters are your opportunity to introduce yourself to other recruiters, showcase how your strengths match what the firm is looking for, and highlight your experiences up to that point. Much like resumes, personalized advice is helpful for cover letters. Traditionally, cover letters should be addressed to the firm’s office at which you are recruiting. Then, you can begin the letter with “Dear (Head Recruiter’s Name),” “To whom it may concern,” or “To (Firm Name)’s Recruiting Team.” The content of the cover letter should start with a brief introduction outlining why you are interested in the firm and end with 2-3 reasons showcasing why you are qualified for the position. The introduction is a great place to name drop individuals you have networked with and mention why what they said led you to resonating with the specific firm. This reinforces the idea that you took the time to network, heightening your interest in the firm. The next 2-3 paragraphs should go in-depth about 2-3 experiences that you have had. Highlight exactly what you did, what you learned, and how you can take your learnings with you into the consulting role that you are applying for. Finally, end with a quick recap of your points, thank them for their time, and sign your name at the bottom. Your cover letter should be one page.</p>
                <h3>Example Questions for Networking Calls</h3>
                <ul>
                    <li>What led you to pursue a career in consulting?</li>
                    <li>What led you to specifically join [X firm]?</li>
                    <li>Have your initial perceptions of a consulting career held up since you’ve been on the job?</li>
                    <li>What kind of project are you currently working on?</li>
                    <li>Do you have a favorite project that you’ve worked on?</li>
                    <li>How would you describe the culture at your firm?</li>
                    <li>What was your internship experience like?</li>
                    <li>How was the transition from intern to full time?</li>
                    <li>What led you to choosing a boutique over a Big 3/4 (or vice versa)?</li>
                    <li>How do you like [X city]?</li>
                    <li>What are some things you like doing for fun outside of the office?</li> 
                    <li>What did you study in college?</li>
                    <li>What was it like going to [X college]?</li>
                    <li>Do you have any advice for someone going through the consulting recruiting process?</li>
                </ul>
                <h3>Subject Line Examples</h3>
                    <p>Your Name - Thank You for Networking Call</p>
                    <p>Your Name - (X University) Student Reaching Out</p>
                    <p>Your Name - (X Club) Member Reaching Out</p>
                    <p>Your Name - Interested in (X Firm)</p>
                    <p>Your Name - Friend of (X Connection) Reaching Out</p>
                <h3>Email Examples</h3>
                <h4>After Networking Event</h4>
                <p>Hi Bryan,</p>
                <p>I just wanted to reach out to thank you for taking the time to speak with me yesterday at the PwC Recruiting Event. It was really interesting hearing about your time in the technology group, and how your responsibilities have changed as you went from an intern to working full time.</p>
                <p>Thank you again for your time, and I hope to stay in touch as the recruiting process continues.</p>
                <p class="best">Best,</p>
                <p>Nate</p>
                <h4>Cold Email to University Alum</h4>
                <p>Hi Brandon,</p>
                <p>My name is Nate Ramras, I'm a sophomore at X University, and I'm recruiting for consulting in this upcoming cycle. I'm very excited to attend the BCG information session next week.</p>
                <p>If you have any availability before then, I would love to speak over the phone with you to learn more about your personal d at the firm within the consumer & retail team. I understand that you are likely very busy, but I am happy to work around your schedule.</p>
                <p>Thank you so much and Go [School Mascot]!</p>
                <p class="best">Best,</p>
                <p>Nate</p>
                <h4>After Networking Call</h4>
                <p>Hi Lili,</p>
                <p>I hope you have had a nice day since we spoke. I just wanted to thank you for taking the time out of your busy schedule to meet with me and share some of your experiences at Bain. It was really interesting to learn about the specific training that you get early on in your career and how it allows you to do things "The Bain Way." I also appreciated you explaining how you have really enjoyed the technical aspect to the job because of the complexities that it requires for your specific finance-heavy project. I will definitely take your recruiting advice and start spending more time on my behaviorals as well!</p>
                <p>I was wondering if you could connect me with your co-worker Brian that you mentioned on the call? I would love to keep learning more about the firm.</p>
                <p>Thank you again for your time and I hope to stay in touch throughout the recruitment process!</p>
                <p class="best">Best,</p>
                <p>Nate</p>
                <h4>After An Interview</h4>
                <p>Hi Monica,</p>
                <p>Thank you so much for taking the time to interview me today. It was great hearing about your time within the consumer & retail group at the firm. I found your insights into the benefits of working across business functions as a young professional to be very interesting. I really appreciate your time, your answers to my questions, and the opportunity to interview for McKinsey.</p>
                <p>Thank you for making the interview process as smooth as possible, and I hope you have a great rest of your week!</p>
                <p class="best">Best,</p>
                <p>Nate</p>
                <h4>Follow Up to Initial Outreach Email</h4>
                <p>Hi Kendall,</p>
                <p>I hope you are well. I just wanted to follow up on this email. It was great getting to meet you at the KPMG event last week, and I would love the chance to speak with you further to learn more about your time at the firm. My week is quite open, and I'm happy to work around your schedule to find a time. Thank you so much!</p>
                <p class="best">Best,</p>
                <p>Nate</p>
            </div>
        </div>
    </div>
    <script>
        var navlinks = document.getElementById("navlinks")
        function showMenu(){
            navlinks.style.right = "0px"
        }
        function hideMenu(){
            navlinks.style.right = "-600px"
        }
        
        window.addEventListener("load", function() {
    // Wait for the page to load completely
    // Find the element you want to apply the transition to
            const rms = document.querySelector(".rms-textbox");
    // Apply the transition by changing the opacity
            rms.style.opacity = 1;
        });
    </script>
    <script src='../assets/js/bestpractices.js'></script>
</body>
</html>