<html>
	<style>
	html, body {
  height: 100%;
  overflow: hidden;
  background: #1d1f20;
}

body {
  display: flex;
  justify-content: center;
  align-items: center;
}

.customTextArea {
  display: flex;
  width: 550px;
  margin: 100px auto 0;
  
  textarea {
    width: 500px;
    height: 350px;
    display: block;
    resize: none;
    padding: 10px 15px;
    border-radius: 5px;
    overflow: hidden;
    border: 0;
    transition: box-shadow 0.5s;
    
    &:focus {
      outline: none;
      box-shadow: 0 0 15px #36383f inset;
    }
  }
  
  ul {
    background: #36383f;
    width: 50px;
    padding: 0;
    margin: 0;
    list-style: none;
    border-radius: 0 5px 5px 0;
  }
  
  button {
    background: #111;
    color: #fff;
    display: block;
    width: 30px;
    line-height: 30px;
    text-align: center;
    padding: 0;
    margin: 10px auto 0;
    border: 0;
    cursor: pointer;
    transition: background-color 0.5s;
    border-radius: 3px;
    
    &:hover {
      background: #666;
    }
    
    &:focus {
      outline: none;
      box-shadow: 0 0 15px inset #000;
    }
  }
}
	</style>
	<script>
	class CustomTextArea extends React.PureComponent {
  static CHARACTERS = ['•', '●', 'Ø', '®', '©']

  setRef = (el) => {
    this.el = el;
  }
  
  insertCharacter = ({ target }) => {
    const char = target.dataset.char;
    const { selectionStart, selectionEnd } = this.el;
    let value = this.el.value;

    value = value.slice(0, selectionStart) + char + value.slice(selectionEnd);
    this.el.value = value;
    
    this.el.focus();
    this.el.selectionEnd = selectionStart + 1;
  }
  
  render() {
    return (<div className="customTextArea">
        <textarea ref={this.setRef} />
        <ul>
          {this.constructor.CHARACTERS.map(char => (
            <li>
              <button
                onClick={this.insertCharacter}
                data-char={char}
                title={`Insert ‘${char}’`}
              >
                {char}
              </button>
            </li>
          ))}
        </ul>
    </div>);
  }
}

ReactDOM.render(<CustomTextArea />, document.getElementById('app'));
	</script>
	<body>
	<div id="app" />
	</body>
</html>