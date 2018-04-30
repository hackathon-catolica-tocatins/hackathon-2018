import React from 'react';
import { View, Image  , StyleSheet, Text, TouchableOpacity, Dimensions} from 'react-native';
import { EventRegister } from 'react-native-event-listeners'


export default class ItemRadioButtonQuest extends React.Component {

    constructor(props){

        super(props)

        this.state = {
            selected: false

        }

    }


    componentWillMount() {
        this.registerListener()
    }

    registerListener(){
        this.listener = EventRegister.addEventListener('desmarcar', (data) => {
            //alert("chegou" + data)

            const a = data.split("|")

            if(this.props.label == a[0] || this.props.fator == a[1] ){
                this.setState({selected:false})
            }})


    }

    componentWillUnmount() {
        EventRegister.removeEventListener(this.listener)
    }

    pressItem(){
        EventRegister.removeEventListener(this.listener)
        EventRegister.emit('desmarcar', this.props.label + "|" + this.props.fator)
        this.registerListener()


    }


    click(){

        this.setState({selected: !this.state.selected})
        this.pressItem();
        //this.props.click()   s

    }


    render() {

        const selecionado = require("../../images/bnt_hex_escuro.png")
        const naoSelecionado = require("../../images/bnt_hex_claro.png")

        return (
            <View style={styles.vContainer}>
                <TouchableOpacity onPress={()=> this.click()}>
                    <View style={styles.item}>
                        <Image source={ this.state.selected ? selecionado : naoSelecionado} style={styles.logo} resizeMode="contain"/>
                        <Text style={styles.label}>{this.props.label}</Text>
                    </View>
                </TouchableOpacity>
            </View>
        )


    }


}


const styles = StyleSheet.create({

    label:{
        fontFamily: "browau",
        fontSize: 25,
        fontWeight: '500',
        textAlign: 'left'
    },

    item:{
        margin: 10,
        flexDirection: 'row',
        alignItems: 'center'
    },

    vContainer: {
        flexDirection: 'row',
        alignItems: 'flex-end',
        justifyContent: 'space-around',
      //  backgroundColor: '#fff'
    },

    logo: {
        width:30,
        height:30,
        marginRight: 10,
    }


});



