<template>
    <div class="component-wrap mr-1" v-if="maxCount">
        <span v-for="(member, key) in members" :key="member.id">
            <v-tooltip top :disabled="tooltip" v-if="maxCount > key">
                <v-avatar size="26px" slot="activator">
                    <v-img v-if="member.avatar_url" :src="member.avatar_url"></v-img>
                    <v-img v-else :src="'https://ui-avatars.com/api/?name=' + member.name"></v-img>
                </v-avatar>
                <span>
                    {{ member.name }}
                </span>
            </v-tooltip>
            <v-tooltip top :disabled="tooltip" v-if="maxCount == key">
                <v-avatar size="26px" slot="activator">
                    <v-img :src="'https://ui-avatars.com/api/?name=...'"></v-img>
                </v-avatar>
                <span>
                    ....
                </span>
            </v-tooltip>
        </span>
    </div>
    <div class="component-wrap" v-else>
        <span v-for="member in members" :key="member.id">
            <v-tooltip top :disabled="tooltip">
                <v-avatar size="26px" slot="activator">
                    <v-img v-if="member.avatar_url" :src="member.avatar_url"></v-img>
                    <v-img v-else :src="member.pivot?member.pivot.status=='accepted'?'https://ui-avatars.com/api/?name=' + member.name +'&background='+backGroundAccept+'&color=fff':member.pivot.status=='rejected'?'https://ui-avatars.com/api/?name=' + member.name +'&background='+backGroundReject+'&color=fff':'https://ui-avatars.com/api/?name=' + member.name:'https://ui-avatars.com/api/?name=' + member.name"></v-img>
                </v-avatar>
                <span v-if="member.pivot && member.pivot.status">
                    {{ member.name +' '+ member.pivot.status }}
                </span>
                 <span v-else>
                    {{ member.name }}
                </span>
            </v-tooltip>
        </span>
    </div>
</template>
<script>
export default {
    props: ['members', 'tooltip', 'maxCount','backGround','status'],
    data(){
        return{
            backGroundAccept: '368e0b',
            backGroundReject: '8d0303'
        }
    },
   watch:{
    backGround(){
        if(this.status === 'accepted')
        this.backGroundAccept = this.backGround
        else if(this.status === 'rejected')
        this.backGroundReject = this.backGround
    }
   }
};
</script>
