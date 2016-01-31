[ Questian ]
Web Programming Study 염승우, 윤신필립, 최성국

- 서비스 목적
    이 서비스는 사용자와 사용자 간의 심부름을 P2P 방식으로 중계해주는 것이 주 목적이다.
    본 서비스의 사용자 유형은 총 두 가지로 나눌 수 있는데, 퀘스트 요청자, 즉 심부름을 요청할 수 있는 사용자와, 퀘스트 수행자, 즉 요청된 심부름을 수행하는 사용자를 의미한다.

     '중고나라'의 심부름 버전이라고 할 수도 있겠다.
    사용자가 심부름을 요청하면 그 심부름 콘텐츠는 본 서비스의 퀘스트 목록에 띄워지게 되며, Facebook, Twitter 등의 SNS에 App Link 및 퀘스트 요청 텍스트를 타임라인에 게시하여, 본 서비스의 사용자 수 증가를 장려할 수 있다.

- 사용자 유형
    퀘스트 요청자
    퀘스트 수행자

    이러한 퀘스트 요청을 수락하는 ‘수행자’ 사용자는 퀘스트 조건과 위치를 숙지하여 퀘스트를 수행하며 보상을 받는 식으로 서비스를 이용한다.



- 서비스 개발계획
    - 포지셔닝
        UI / UX Design : 염승우
        Server-Side PHP : 염승우, 윤신필립, 최성국
        Web Front-end, Back-end : 염승우, 윤신필립, 최성국

- 서비스 추상화 [DB schema]
    - 퀘스트 콘텐츠(/quest/contentId)
        questTitle : String // 퀘스트 요청 제목
        questTerms : List<QuestTerm> // 퀘스트 조건
        questLocation : Map<Double : Double> // 퀘스트 요청자 위치 좌표
        questianContacts : List<QuestContact> // 퀘스트 요청자 연락처 (사용자 정보 이용)
        questRewards : List<QuestReward> // 퀘스트 보상
        questAuthor : String // userData반환

    - 사용자 (/user/:id)
        userId : String // 유저 아이디
        userPw : String // 유저 패스워드
        userToken : String // 유저 토큰
        uid : String // 유저 고유번호
        userExpireTime : Integer(UnixTimebased) // 유저 토큰 만료 시간
        userLocation : Map<Double, Double> // 유저 최근 위치
        userProfileImg : String // 유저 프로필 이미지

    - 회원가입 (/signup)
        userId : String
        userPw : String
        capchaImgUrl : String
        capchaCode : String
