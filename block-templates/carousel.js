const { registerBlockType } = wp.blocks;
const { __ } = wp.i18n;
const { InspectorControls } = wp.blockEditor;

registerBlockType('ccg/carousel', {
  title: 'Carousel',
  icon: 'update',
  category: 'media',
  attributes: {
    content: {type: 'string'},
    color: {type: 'string'}
  },
  edit: (props) => {
    function updateContent(event) {
      props.setAttributes({content: event.target.value})
    }
    
    function updateColor(value) {
      console.log(value)
      props.setAttributes({color: value.hex})
    }

    return [
      <InspectorControls>Hello From Inspector</InspectorControls>,
      <div className={props.className}>
        <ul className="list-unstyled">
          <li>First one</li>
          <li>
            <label>
            Content:
              <input type="text" value={props.attributes.content} onChangeComplete={updateContent} />
            </label>
          </li>
          <li>
            <label>
              Color: <input type="text" value={props.attributes.color} onChangeComplete={updateColor} />
            </label>
          </li>
          <li>Another one</li>
        </ul>
      </div>
    ]
  },
  save: function(props){
    return <h3 className={props.className} style={`border: 5px solid ${props.attributes.color}`}> {props.attributes.content}</h3>;
    // <p>Hello World</p>
  }
});
