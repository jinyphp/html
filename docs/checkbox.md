# HTML 체크박스 생성

이 문서에서는 PHP 클래스를 사용하여 HTML 체크박스를 생성하고 설정하는 방법에 대해 설명합니다. 제공된 코드에는 두 가지 주요 클래스가 포함되어 있습니다:

- **`CCheckBox`**: 개별 체크박스를 생성합니다.
- **`CCheckBoxList`**: 체크박스 목록을 생성하고 관리합니다.

## `CCheckBox` 클래스

`CCheckBox` 클래스는 HTML 체크박스를 생성하는 기능을 제공합니다. 이 클래스는 체크박스의 기본적인 속성 설정과 체크 상태를 관리할 수 있는 메서드를 포함하고 있습니다.

### 주요 속성

- **`$label`**: 체크박스에 표시할 레이블 텍스트.
- **`$name`**: 체크박스의 이름 속성.
- **`$value`**: 체크박스의 값 속성.
- **`$checked`**: 체크박스의 체크 여부를 나타내는 불리언 값.
- **`$label_position`**: 레이블의 위치(체크박스 왼쪽 또는 오른쪽).

### 주요 메서드

#### `__construct($name = 'checkbox', $value = '1')`

- **기능**: 체크박스의 이름과 값을 초기화합니다.
- **매개변수**:
  - `$name`: 체크박스의 이름 속성 (기본값: 'checkbox').
  - `$value`: 체크박스의 값 속성 (기본값: '1').

#### `setChecked($checked)`

- **기능**: 체크박스의 체크 상태를 설정합니다.
- **매개변수**: 
  - `$checked`: 체크 상태 (true 또는 false).
- **반환값**: `CCheckBox` 객체 (메서드 체이닝 지원).

#### `setLabel($label)`

- **기능**: 체크박스의 레이블 텍스트를 설정합니다.
- **매개변수**: 
  - `$label`: 체크박스의 레이블 텍스트.
- **반환값**: `CCheckBox` 객체.

#### `setLabelPosition($label_position)`

- **기능**: 체크박스 레이블의 위치를 설정합니다.
- **매개변수**:
  - `$label_position`: 레이블의 위치 (LABEL_POSITION_LEFT 또는 LABEL_POSITION_RIGHT).
- **반환값**: `CCheckBox` 객체.

#### `setUncheckedValue($value)`

- **기능**: 체크되지 않은 상태에서의 값을 설정합니다.
- **매개변수**:
  - `$value`: 체크되지 않은 상태의 값.
- **반환값**: `CCheckBox` 객체.

#### `toString($destroy = true)`

- **기능**: 체크박스 HTML을 문자열로 변환합니다.
- **매개변수**:
  - `$destroy`: 객체가 사용된 후 삭제할지 여부 (기본값: true).
- **반환값**: 체크박스 HTML 문자열.

### HTML 생성 예제

```php
$checkbox = (new CCheckBox('subscribe', 'yes'))
    ->setLabel('뉴스레터 구독')
    ->setChecked(true)
    ->setLabelPosition(CCheckBox::LABEL_POSITION_RIGHT);

echo $checkbox->toString(); // HTML 문자열 출력
```

위의 예제는 "뉴스레터 구독"이라는 레이블을 가진 체크박스를 생성합니다. 체크박스는 오른쪽에 레이블이 위치하며, 기본값으로 체크 상태입니다.

## `CCheckBoxList` 클래스

`CCheckBoxList` 클래스는 체크박스 목록을 생성하고 관리하는 기능을 제공합니다. 여러 체크박스를 하나의 리스트로 그룹화할 수 있습니다.

### 주요 속성

- **`$values`**: 체크박스 목록의 값을 저장합니다.
- **`$name`**: 체크박스 목록의 이름 속성.
- **`$enabled`**: 체크박스 목록의 활성화 상태.
- **`$uniqid`**: 체크박스 ID의 유니크 접미사.

### 주요 메서드

#### `__construct($name)`

- **기능**: 체크박스 목록의 이름을 초기화합니다.
- **매개변수**: 
  - `$name`: 체크박스 목록의 이름 속성.

#### `setUniqid(string $uniqid)`

- **기능**: 체크박스 ID의 유니크 접미사를 설정합니다.
- **매개변수**:
  - `$uniqid`: 유니크 ID 문자열.
- **반환값**: `CCheckBoxList` 객체.

#### `setChecked(array $values)`

- **기능**: 주어진 값으로 체크박스의 체크 상태를 설정합니다.
- **매개변수**:
  - `$values`: 체크 상태를 설정할 값들의 배열.
- **반환값**: `CCheckBoxList` 객체.

#### `setOptions(array $values)`

- **기능**: 체크박스 목록의 옵션을 설정합니다.
- **매개변수**:
  - `$values`: 체크박스 옵션들의 배열.
- **반환값**: `CCheckBoxList` 객체.

#### `setWidth($value)`

- **기능**: 체크박스 목록의 너비를 설정합니다.
- **매개변수**:
  - `$value`: 목록의 너비 (픽셀 단위).
- **반환값**: `CCheckBoxList` 객체.

#### `setEnabled($enabled)`

- **기능**: 체크박스 목록의 활성화 상태를 설정합니다.
- **매개변수**:
  - `$enabled`: 체크박스 목록의 활성화 상태 (true 또는 false).
- **반환값**: `CCheckBoxList` 객체.

#### `toString($destroy = true)`

- **기능**: 체크박스 목록의 HTML을 문자열로 변환합니다.
- **매개변수**:
  - `$destroy`: 객체가 사용된 후 삭제할지 여부 (기본값: true).
- **반환값**: 체크박스 목록의 HTML 문자열.

### HTML 생성 예제

```php
$checkboxList = (new CCheckBoxList('options'))
    ->setOptions([
        ['name' => '옵션 1', 'value' => '1', 'checked' => true],
        ['name' => '옵션 2', 'value' => '2'],
        ['name' => '옵션 3', 'value' => '3']
    ])
    ->setUniqid('list1')
    ->setWidth(300);

echo $checkboxList->toString(); // HTML 문자열 출력
```

위의 예제는 '옵션 1', '옵션 2', '옵션 3'을 포함하는 체크박스 목록을 생성합니다. 각 체크박스의 값과 체크 상태를 설정할 수 있으며, 목록의 너비와 유니크 ID도 설정됩니다.

## 결론

`CCheckBox`와 `CCheckBoxList` 클래스를 사용하면 PHP에서 HTML 체크박스를 효율적으로 생성하고 관리할 수 있습니다. 각 클래스는 체크박스의 속성을 세부적으로 설정할 수 있는 메서드를 제공하며, 이를 통해 동적이고 사용자의 요구에 맞는 체크박스 UI를 생성할 수 있습니다.