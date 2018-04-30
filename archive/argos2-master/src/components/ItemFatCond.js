import React from 'react';
import {
    StyleSheet,
    Text,
    View,
    Image,
    Dimensions,
    PixelRatio,
    ActivityIndicator,
    TouchableOpacity,
    Platform,
    FlatList

} from 'react-native';



import Icon from 'react-native-vector-icons/FontAwesome';

import ItemRadioButton from './ItemRadioButton'


export default class ItemFatCond extends React.Component {

    constructor(props) {

        super(props)

        var newList = []

        for( var i = this.props.max ; i >= this.props.min ; i--){
            newList.push(i)
         }


        this.state = {
            listOpc: newList
        }

    }

    static navigationOptions = {
        header: null,
        gesturesEnabled: true
    }




    render() {



        return (

            <View style={styles.content}>
                <View style={styles.vwTitulo}>
                    <Text style={styles.titulo}>{this.props.titulo}: </Text>
                </View>
                <View style={styles.vwOpcoes}>
                    {
                        this.state.listOpc.map((item) => {
                            return (
                                <ItemRadioButton label={item} fator={this.props.id}></ItemRadioButton>
                            )
                        })
                    }
                </View>
            </View>



        );
    } 

}


const styles = StyleSheet.create({

    content:{
      flexDirection: 'row',
     alignItems: 'center'


    },

    titulo:{
        fontFamily: "browau",
        fontSize: 25,
        fontWeight: '500',
        textAlign: 'right',
        //flex:1,
    },
    vwTitulo:{
      flex:1,
    },
     vwOpcoes:{
         flex:1,
         flexDirection: 'row'


     }

});