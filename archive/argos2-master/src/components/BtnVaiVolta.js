import React from 'react';
import { View, Image  , StyleSheet, Text, TouchableOpacity, Dimensions} from 'react-native';


const BtnVaiVolta = (props) => {
    var {functionBack, functionFront} = props;
    return (

        <View style={styles.vContainer}>

            <TouchableOpacity onPress={()=> functionBack()}>
                <Image source={require("../../images/botao_voltar.png")} style={styles.logo} resizeMode="contain"/>
            </TouchableOpacity>

            <TouchableOpacity onPress={()=> functionFront()}>
                <Image source={require("../../images/botao_proximo.png")} style={styles.logo} resizeMode="contain"/>
            </TouchableOpacity>


        </View>
    )


}


const styles = StyleSheet.create({

    vContainer: {
        flexDirection: 'row',
        alignItems: 'flex-end',
        justifyContent: 'space-around',
        //backgroundColor: '#fff'
    },

    logo:{
        width: Dimensions.get('window').width * .12,
        height: Dimensions.get('window').height * .15 ,
    }


});

export default BtnVaiVolta;

