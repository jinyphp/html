# Jiny HTML

`jiny/html`는 서버사이드 HTML 코드를 객체 지향적으로 생성할 수 있는 Laravel 패키지입니다. 복잡한 HTML 구조를 데이터 기반으로 안전하고 유지보수하기 쉽게 빌드할 수 있습니다.

## 특징

- 📦 **객체 지향적 HTML 생성**: PHP 객체를 통한 type-safe HTML 생성
- 🎨 **풍부한 컴포넌트**: 폼, 테이블, SVG 등 다양한 HTML 요소 지원
- 🔧 **Laravel 통합**: Laravel Service Provider 및 Blade 컴포넌트 지원
- 🛡️ **안전한 출력**: XSS 방지를 위한 자동 이스케이프 처리
- 📝 **유연한 구조**: 메서드 체이닝을 통한 직관적인 API

## 디렉토리 구조

```
jiny/html/
├── src/                   # 소스 코드
│   ├── Core/             # 핵심 기본 클래스
│   │   └── CTag.php      # 모든 HTML 요소의 기본 클래스
│   ├── Components/       # 기본 HTML 컴포넌트
│   │   ├── CDiv.php
│   │   ├── CSpan.php
│   │   ├── CButton.php
│   │   └── ...
│   ├── Forms/            # 폼 관련 컴포넌트
│   │   ├── CForm.php
│   │   ├── CInput.php
│   │   └── ...
│   ├── Tables/           # 테이블 관련 컴포넌트
│   │   ├── CTable.php
│   │   ├── CRow.php
│   │   └── ...
│   ├── Widgets/          # 고급 UI 위젯
│   ├── Svg/             # SVG 관련 컴포넌트
│   └── Helpers/         # 헬퍼 함수들
│       ├── helpers.php
│       └── constants.php
├── tests/               # 테스트 코드
│   ├── Unit/
│   └── Feature/
├── docs/                # 문서화
├── JinyHtmlServiceProvider.php  # Laravel 서비스 프로바이더
└── composer.json        # Composer 설정
```

## 설치방법

Laravel 프로젝트에서 Composer를 통하여 패키지를 설치합니다:

```bash
composer require jiny/html
```

Laravel의 패키지 자동 발견 기능으로 서비스 프로바이더가 자동 등록됩니다.

## 기본 사용법

### 헬퍼 함수 사용

```php
// 헬퍼 함수로 간편하게 사용
$div = CDiv('Hello World')
    ->addClass('container')
    ->setId('main-content');
echo $div; // <div class="container" id="main-content">Hello World</div>

// 버튼 생성
$button = CButton('submit-btn', '전송')
    ->addClass('btn btn-primary');
```

### 메서드 체이닝

대부분의 메서드는 체이닝을 지원합니다:

```php
$button = (new CTag('button'))
    ->setAttribute('type', 'submit')
    ->setAttribute('class', 'btn btn-primary')
    ->setBodyContent('전송');
```

### 폼 컴포넌트

```php
// 헬퍼 함수 사용
$form = CForm()
    ->setAttribute('method', 'post')
    ->setAttribute('action', '/submit')
    ->addItem([
        CLabel('이메일:', 'email'),
        CEmail()->setAttribute('name', 'email')->setAttribute('required', 'required'),
        CTextBox('username', '', false, 100)->setAttribute('placeholder', '사용자명'),
        CCheckBox('agree', '1')->setLabel('동의합니다'),
        CButton('submit', '전송')->setAttribute('type', 'submit')
    ]);

echo $form;
```

### 테이블 컴포넌트

```php
// 헬퍼 함수 사용
$table = CTable()
    ->addClass('table table-striped')
    ->addItem([
        CRow([
            CColHeader('이름'),
            CColHeader('이메일'),
            CColHeader('상태')
        ]),
        CRow([
            CCol('홍길동'),
            CCol('hong@example.com'),
            CCol('활성')->addClass('text-success')
        ])
    ]);

echo $table;
```

## 고급 기능

### 조건부 렌더링

```php
$div = new CDiv();
if ($showContent) {
    $div->setBodyContent('표시할 내용');
} else {
    $div->setBodyContent('기본 내용');
}
```

### 동적 속성 설정

```php
$element = new CTag('span');
$attributes = [
    'class' => 'highlight',
    'data-value' => $dynamicValue
];

foreach ($attributes as $key => $value) {
    $element->setAttribute($key, $value);
}
```

## 문서

자세한 사용법은 [docs](./docs/) 폴더의 문서를 참조하세요:

- [Button 컴포넌트](./docs/button.md)
- [Div 컴포넌트](./docs/div.md) 
- [Input 컴포넌트](./docs/input.md)
- [Link 컴포넌트](./docs/link.md)
- [Select 컴포넌트](./docs/select.md)
- [Span 컴포넌트](./docs/span.md)

## 라이센스

이 패키지는 MIT 라이센스 하에 배포됩니다. 자세한 내용은 [license.md](./license.md)를 확인하세요.

## 기여하기

버그 리포트, 기능 제안, 또는 풀 리퀘스트를 환영합니다. 기여하기 전에 코드 스타일과 테스트를 확인해 주세요.
